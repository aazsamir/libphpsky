<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Generator\Prefab;

trait FromArray
{
    public static function fromArray(mixed $data): self
    {
        if (!\is_array($data)) {
            throw new \InvalidArgumentException('Data must be an array');
        }

        $instance = new self();
        $reflection = new \ReflectionClass($instance);

        foreach ($data as $key => $value) {
            $property = $reflection->getProperty($key);
            $propertyType = $property->getType();

            if ($propertyType === null) {
                $instance->{$key} = $value;

                continue;
            }

            if (!$propertyType instanceof \ReflectionNamedType) {
                throw new \RuntimeException('Union and Intersection types are not supported yet');
            }

            if ($propertyType->getName() === 'array') {
                // get phpdoc type
                $docComment = $property->getDocComment();

                if ($docComment === false) {
                    throw new \RuntimeException('Property must have a docblock');
                }

                preg_match('/@var\s+([^\s]+)/', $docComment, $matches);

                if (!isset($matches[1])) {
                    throw new \RuntimeException('Property must have a type hint');
                }

                $type = $matches[1];
                $type = str_replace('[]', '', $type);
                // if is builtin type
                if (\in_array($type, ['int', 'float', 'string', 'bool', 'mixed', 'array'], true)) {
                    $instance->{$key} = $value;

                    continue;
                }

                if (\is_array($value)) {
                    $instance->{$key} = array_map(static fn ($item) => $type::fromArray($item), $value);
                }

                continue;
            }

            if ($propertyType->isBuiltin()) {
                $instance->{$key} = $value;

                continue;
            }

            if ($propertyType->allowsNull() && $value === null) {
                $instance->{$key} = null;

                continue;
            }

            $instance->{$key} = $propertyType->getName()::fromArray($value);
        }

        return $instance;
    }
}
