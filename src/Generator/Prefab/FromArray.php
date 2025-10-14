<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Generator\Prefab;

/**
 * @internal
 */
trait FromArray
{
    public static function fromArray(mixed $data, ?TypeResolver $typeResolver = null): self
    {
        $typeResolver ??= TypeResolver::default();

        if (!\is_array($data)) {
            throw new \InvalidArgumentException('Data must be an array');
        }

        $instance = new self();
        $reflection = new \ReflectionClass($instance);

        $nullableFields = $reflection->getProperties();
        $nullableFields = array_filter($nullableFields, static fn (\ReflectionProperty $property) => (bool) $property->getType()?->allowsNull());

        foreach ($nullableFields as $property) {
            $instance->{$property->getName()} = null;
        }

        foreach ($data as $key => $value) {
            if (str_starts_with($key, '$')) {
                continue;
            }

            if (!$reflection->hasProperty($key)) {
                continue;
            }

            $property = $reflection->getProperty($key);
            $propertyType = $property->getType();

            if ($propertyType === null) {
                $instance->{$key} = $value;

                continue;
            }

            if ($propertyType->allowsNull() && $value === null) {
                $instance->{$key} = null;

                continue;
            }

            if (!$propertyType instanceof \ReflectionNamedType) {
                throw new \RuntimeException('Union and Intersection types are not supported yet');
            }

            // union defs
            if (
                $propertyType->getName() === 'mixed'
                && $property->getDocComment() !== false
                && \is_array($data[$key])
                && isset($data[$key]['$type'])
            ) {
                $docComment = $property->getDocComment();
                preg_match('/@var\s+([^\s]+)/', $docComment, $matches);

                if (!isset($matches[1])) {
                    throw new \RuntimeException('Property must have a type hint');
                }

                $types = explode('|', $matches[1]);
                $nullable = false;

                foreach ($types as $type) {
                    if ($type === 'null') {
                        $nullable = true;

                        continue;
                    }

                    /** @phpstan-ignore-next-line */
                    $classname = $type::ID . '#' . $type::NAME;

                    if ($classname === $data[$key]['$type']) {
                        $instance->{$key} = $type::fromArray($value, $typeResolver);

                        break;
                    }
                }

                if ($nullable && $value === null) {
                    $instance->{$key} = null;
                }

                continue;
            }

            // array defs
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
                $type = str_replace('array<', '', $type);
                $type = str_replace('>', '', $type);
                $nullable = str_contains($type, '|null');
                $type = str_replace('|null', '', $type);
                $type = str_replace('?', '', $type);
                // if is builtin type
                if (\in_array($type, ['int', 'float', 'string', 'bool', 'mixed', 'array'], true)) {
                    $instance->{$key} = $value;

                    continue;
                }

                if (\is_array($value)) {
                    if (str_contains($type, '|')) {
                        $types = explode('|', $type);
                        $resolved = [];

                        foreach ($value as $v) {
                            foreach ($types as $type) {
                                if (!class_exists($type)) {
                                    continue;
                                }

                                if (!\is_array($v)) {
                                    continue;
                                }

                                if (!isset($v['$type'])) {
                                    continue;
                                }

                                /** @phpstan-ignore-next-line */
                                $classname = $type::ID . '#' . $type::NAME;

                                if ($classname === $v['$type']) {
                                    $resolved[] = $type::fromArray($v, $typeResolver);
                                }
                            }
                        }

                        $instance->{$key} = $resolved;
                    } else {
                        if (class_exists($type)) {
                            $instance->{$key} = array_map(static fn ($item) => $type::fromArray($item, $typeResolver), $value);

                            continue;
                        }
                    }
                }

                if (!isset($instance->{$key})) {
                    $instance->{$key} = $value;
                }

                continue;
            }

            // unknown defs
            if (
                $propertyType->getName() === 'mixed'
                && \is_array($data[$key])
                && isset($data[$key]['$type'])
                && \is_string($data[$key]['$type'])
            ) {
                $type = $typeResolver->resolve($data[$key]['$type']);

                if ($type) {
                    $instance->{$key} = $type::fromArray($value, $typeResolver);
                } else {
                    $instance->{$key} = $value;
                }

                continue;
            }

            if ($propertyType->isBuiltin()) {
                // ugly handling of blobs, should be refactored
                if (
                    \is_array($value)
                    && $propertyType->getName() === 'string'
                    && isset($value['$type'])
                    && $value['$type'] === 'blob'
                    && isset($value['ref'])
                    && \is_array($value['ref'])
                    && isset($value['ref']['$link'])
                ) {
                    $link = $value['ref']['$link'];
                    $instance->{$key} = $link;

                    continue;
                }

                $instance->{$key} = $value;

                continue;
            }

            if ($propertyType->getName() === \DateTimeInterface::class && \is_string($value)) {
                if (is_numeric($value)) {
                    $instance->{$key} = new \DateTimeImmutable('@' . $value);
                } else {
                    $instance->{$key} = new \DateTimeImmutable($value);
                }

                continue;
            }

            $instance->{$key} = $propertyType->getName()::fromArray($value, $typeResolver);
        }

        return $instance;
    }
}
