<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Maker;

use Aazsamir\Libphpsky\Generator\Lexicon\Def\ArrayDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\Def;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\ParamsDef;
use Nette\PhpGenerator\Method;

/**
 * @internal
 */
trait AddParameters
{
    private function addParameters(Method $method, ParamsDef $def): void
    {
        $properties = $def->properties()->toArray();
        // sort by nullability
        $required = $def->required() ?? [];
        usort($properties, static fn ($a, $b): int => !\in_array($a->name(), $required, true) <=> !\in_array($b->name(), $required, true));

        foreach ($properties as $property) {
            $propertyName = $property->name();
            $property = $this->unref($property);
            $parameter = $method->addParameter($propertyName);
            $parameterType = $this->classResolver()->namespaceAndClassname($property);
            $nullable = !\in_array($propertyName, $required, true);

            if ($property instanceof ArrayDef) {
                $parameter->setType('array');
            } else {
                $parameter->setType($parameterType);
            }

            $this->addParamComment($method, $propertyName, $parameterType, $nullable, $property->description());

            if ($nullable) {
                $parameter->setNullable(true)->setDefaultValue(null);
            }
        }
    }

    private function addParamComment(
        Method $method,
        string $name,
        string $type,
        bool $nullable,
        ?string $description,
    ): void {
        if (str_starts_with($type, 'array<')) {
            $method->addComment(
                '@param '
                    . ($nullable ? '?' : '')
                    . $type
                    . ' $' . $name
                    . ' '
                    . ($description ? ' ' . $description : ''),
            );

            return;
        }

        if ($description) {
            $method->addComment(
                '@param '
                    . ($nullable ? '?' : '')
                    . $type
                    . ' $' . $name
                    . ' '
                    . $description,
            );
        }
    }

    abstract private function classResolver(): ClassResolver;

    abstract private function unref(Def $def): Def;
}
