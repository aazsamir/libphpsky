<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Maker;

use Aazsamir\Libphpsky\ATProtoObject;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\ArrayDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\Def;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\ObjectDef;
use Aazsamir\Libphpsky\Generator\Lexicon\Def\UnionDef;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\Type;

class ObjectDefHandler implements DefHandler
{
    use AddParameters;
    use DefHandlerCommon;
    use Unref;

    public function __construct(
        private ClassResolver $classResolver,
        private SaveClass $saveClass,
    ) {}

    public function handle(Def $def): void
    {
        if (!$def instanceof ObjectDef) {
            return;
        }

        [$class, $phpNamespace] = $this->createClass($def);
        $this->createObject($class, $def);

        $this->saveClass->save($class, $phpNamespace);
    }

    private function createObject(ClassType $class, ObjectDef $def): void
    {
        $class->addTrait('\Aazsamir\Libphpsky\Generator\Prefab\FromArray');
        $class->addTrait('\Aazsamir\Libphpsky\Generator\Prefab\ToArray');
        $class->addImplement(ATProtoObject::class);

        $constructorTypes = $this->addObjectParameters($class, $def);
        $this->addObjectConstructor($class, $def, $constructorTypes);
    }

    /**
     * @return array<array{name: string, type: string, nullable: bool, comment: string|null}>
     */
    private function addObjectParameters(ClassType $class, ObjectDef $def): array
    {
        $constructorTypes = [];

        foreach ($def->properties()->toArray() as $property) {
            $propertyName = $property->name();
            $description = $property->description();
            $property = $this->unref($property);
            $phpProperty = $class->addProperty($propertyName);
            $phpPropertyType = $this->classResolver->namespaceAndClassname($property);
            $required = $def->required() ? \in_array($property->name(), $def->required(), true) : false;
            $nullable = $def->nullable() ? \in_array($property->name(), $def->nullable(), true) : false;

            if ($nullable) {
                $phpProperty->setValue(null);
            }

            $nullable = $nullable || !$required;

            if ($nullable) {
                $phpProperty->setNullable($nullable);
            }

            if ($property instanceof ArrayDef) {
                $phpProperty->setType('array');
                $phpProperty->addComment(
                    '@var '
                    . ($nullable ? '?' : '')
                    . $phpPropertyType
                    . ($description ? ' ' . $description : '')
                );
            } elseif ($property instanceof UnionDef) {
                $phpProperty->setType('mixed');
                $types = [];

                foreach ($property->resolvedRefs() as $type) {
                    $types[] = $this->classResolver->namespaceAndClassname($type);
                }

                if ($types) {
                    if ($nullable) {
                        $types[] = 'null';
                    }

                    $types = Type::union(...$types);
                    $phpProperty->addComment('@var ' . $types . ($description ? ' ' . $description : ''));
                }
            } else {
                $phpProperty->setType($phpPropertyType);

                if ($description) {
                    $phpProperty->addComment(
                        '@var '
                        . ($nullable ? '?' : '')
                        . $phpPropertyType
                        . ' '
                        . $description
                    );
                }
            }

            if ($property instanceof ArrayDef) {
                $phpProperty->setValue([]);
                $constructorTypes[] = [
                    'name' => $propertyName,
                    'type' => 'array',
                    'nullable' => $nullable,
                    'comment' => '@param ' . $phpPropertyType . ' $' . $propertyName,
                ];
            } else {
                $constructorTypes[] = [
                    'name' => $propertyName,
                    'type' => $phpPropertyType,
                    'nullable' => $nullable,
                    'comment' => null,
                ];
            }
        }

        $nullableMethod = $class->addMethod('nullable');
        $nullableMethod->setPublic();
        $nullableMethod->setReturnType('array');
        $nullableMethod->setStatic();
        $nullableMethod->addBody('return [' . implode(', ', array_map(static fn ($name) => "'$name'", $def->nullable() ?? [])) . '];');

        $requiredMethod = $class->addMethod('required');
        $requiredMethod->setPublic();
        $requiredMethod->setReturnType('array');
        $requiredMethod->setStatic();
        $requiredMethod->addBody('return [' . implode(', ', array_map(static fn ($name) => "'$name'", $def->required() ?? [])) . '];');

        return $constructorTypes;
    }

    /**
     * @param array<array{name: string, type: string, nullable: bool, comment: string|null}> $constructorTypes
     */
    private function addObjectConstructor(ClassType $class, ObjectDef $def, array $constructorTypes): void
    {
        // nullable last
        usort($constructorTypes, static fn ($a, $b) => $a['nullable'] <=> $b['nullable']);
        $constructor = $class->addMethod('new')->setStatic()->setReturnType('self');
        $constructor->addBody('$instance = new self();');

        foreach ($constructorTypes as $type) {
            $parameter = $constructor->addParameter($type['name']);
            $parameter->setType($type['type']);
            $parameter->setNullable($type['nullable']);

            if ($type['comment']) {
                $constructor->addComment($type['comment']);
            }

            if ($type['nullable']) {
                if ($type['type'] === 'array') {
                    $parameter->setDefaultValue([]);
                } else {
                    $parameter->setDefaultValue(null);
                }

                $nullable = $def->nullable() ? \in_array($type['name'], $def->nullable(), true) : false;

                if ($nullable) {
                    $constructor->addBody('$instance->' . $type['name'] . ' = $' . $type['name'] . ';');
                } else {
                    $constructor->addBody(\sprintf('if ($%s !== null) {', $type['name']));
                    $constructor->addBody(\sprintf('    $instance->%s = $%s;', $type['name'], $type['name']));
                    $constructor->addBody('}');
                }
            } else {
                $constructor->addBody(\sprintf('$instance->%s = $%s;', $type['name'], $type['name']));
            }
        }

        $constructor->addBody('');
        $constructor->addBody('return $instance;');
    }

    private function classResolver(): ClassResolver
    {
        return $this->classResolver;
    }
}
