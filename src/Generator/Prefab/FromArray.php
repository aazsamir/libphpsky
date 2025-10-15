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
        if (!\is_array($data)) {
            throw new \InvalidArgumentException('Data must be an array');
        }

        $typeResolver ??= TypeResolver::default();

        $instance = new self();
        $reflection = new \ReflectionClass($instance);

        self::fillNulls($instance, $reflection);

        foreach ($data as $key => $value) {
            self::handleProperty(
                $instance,
                $reflection,
                (string) $key,
                $value,
                $typeResolver,
            );
        }

        return $instance;
    }

    /**
     * @param \ReflectionClass<self> $reflection
     */
    private static function fillNulls(self $instance, \ReflectionClass $reflection): void
    {
        foreach (self::nullableFields($reflection) as $property) {
            $instance->{$property->getName()} = null;
        }
    }

    /**
     * @param \ReflectionClass<self> $reflection
     *
     * @return \ReflectionProperty[]
     */
    private static function nullableFields(\ReflectionClass $reflection): array
    {
        $nullableFields = $reflection->getProperties();
        $nullableFields = array_filter($nullableFields, static fn (\ReflectionProperty $property): bool => (bool) $property->getType()?->allowsNull());

        return $nullableFields;
    }

    /**
     * @param \ReflectionClass<self> $reflection
     */
    private static function handleProperty(
        self $instance,
        \ReflectionClass $reflection,
        string $key,
        mixed $value,
        TypeResolver $typeResolver,
    ): void {
        if (str_starts_with($key, '$')) {
            return;
        }

        if (!$reflection->hasProperty($key)) {
            return;
        }

        $property = $reflection->getProperty($key);
        $propertyType = $property->getType();

        if ($propertyType === null) {
            $instance->{$key} = $value;

            return;
        }

        if ($propertyType->allowsNull() && $value === null) {
            $instance->{$key} = null;

            return;
        }

        if (!$propertyType instanceof \ReflectionNamedType) {
            throw new \RuntimeException('Union and Intersection types are not supported yet');
        }

        if (self::isUnionDef($property, $propertyType, $value)) {
            self::handleUnionDef($instance, $property, $key, $value, $typeResolver);

            return;
        }

        if (self::isArrayDef($propertyType)) {
            self::handleArrayDef($instance, $property, $key, $value, $typeResolver);

            return;
        }

        // TODO: I'm not sure why phpstan is complaining here that it will always be false
        // @phpstan-ignore-next-line
        if (self::isUnknownDef($propertyType, $value)) {
            self::handleUnknownDef($instance, $key, $value, $typeResolver);

            return;
        }

        if ($propertyType->isBuiltin()) {
            // @phpstan-ignore-next-line
            if (self::isBlobDef($propertyType, $value)) {
                self::handleBlobDef($instance, $key, $value);

                return;
            }

            $instance->{$key} = $value;

            return;
        }

        if (self::isDateTime($propertyType, $value)) {
            self::handleDateTime($instance, $key, $value);

            return;
        }

        $instance->{$key} = $propertyType->getName()::fromArray($value, $typeResolver);
    }

    /**
     * @phpstan-assert-if-true array{ '$type': string } $value
     */
    private static function isUnionDef(
        \ReflectionProperty $property,
        \ReflectionNamedType $propertyType,
        mixed $value,
    ): bool {
        if ($propertyType->getName() !== 'mixed') {
            return false;
        }

        if ($property->getDocComment() === false) {
            return false;
        }

        if (!\is_array($value)) {
            return false;
        }

        if (!isset($value['$type'])) {
            return false;
        }

        return true;
    }

    /**
     * @param array{ '$type': string } $value
     */
    private static function handleUnionDef(
        self $instance,
        \ReflectionProperty $property,
        string|int $key,
        array $value,
        TypeResolver $typeResolver,
    ): void {
        /** @var string */
        $docComment = $property->getDocComment();
        preg_match('/@var\s+([^\s]+)/', $docComment, $matches);

        if (!isset($matches[1])) {
            throw new \RuntimeException('Property must have a type hint');
        }

        $types = explode('|', $matches[1]);

        foreach ($types as $type) {
            if ($type === 'null') {
                continue;
            }

            /** @phpstan-ignore-next-line */
            $classname = $type::ID . '#' . $type::NAME;

            if ($classname === $value['$type']) {
                $instance->{$key} = $type::fromArray($value, $typeResolver);

                break;
            }
        }
    }

    private static function isArrayDef(\ReflectionNamedType $propertyType): bool
    {
        return $propertyType->getName() === 'array';
    }

    private static function handleArrayDef(
        self $instance,
        \ReflectionProperty $property,
        string|int $key,
        mixed $value,
        TypeResolver $typeResolver,
    ): void {
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
        $type = str_replace('|null', '', $type);
        $type = str_replace('?', '', $type);
        // if is builtin type
        if (\in_array($type, ['int', 'float', 'string', 'bool', 'mixed', 'array'], true)) {
            $instance->{$key} = $value;

            return;
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

                    return;
                }
            }
        }

        if (!isset($instance->{$key})) {
            $instance->{$key} = $value;
        }
    }

    /**
     * @phpstan-assert-if-true array{ '$type': string } $value
     */
    private static function isUnknownDef(
        \ReflectionNamedType $propertyType,
        mixed $value,
    ): bool {
        if ($propertyType->getName() !== 'mixed') {
            return false;
        }

        if (!\is_array($value)) {
            return false;
        }

        if (!isset($value['$type'])) {
            return false;
        }

        if (!\is_string($value['$type'])) {
            return false;
        }

        return true;
    }

    /**
     * @param array{ '$type': string } $value
     */
    private static function handleUnknownDef(
        self $instance,
        string|int $key,
        array $value,
        TypeResolver $typeResolver,
    ): void {
        $type = $typeResolver->resolve($value['$type']);

        if ($type) {
            $instance->{$key} = $type::fromArray($value, $typeResolver);
        } else {
            $instance->{$key} = $value;
        }
    }

    /**
     * @phpstan-assert-if-true array{ '$type': 'blob', 'ref': array{ '$link': string } } $value
     */
    private static function isBlobDef(
        \ReflectionNamedType $propertyType,
        mixed $value,
    ): bool {
        if ($propertyType->getName() !== 'string') {
            return false;
        }

        if (!\is_array($value)) {
            return false;
        }

        if (!isset($value['$type'])) {
            return false;
        }

        if ($value['$type'] !== 'blob') {
            return false;
        }

        if (!isset($value['ref'])) {
            return false;
        }

        if (!\is_array($value['ref'])) {
            return false;
        }

        if (!isset($value['ref']['$link'])) {
            return false;
        }

        if (!\is_string($value['ref']['$link'])) {
            return false;
        }

        return true;
    }

    /**
     * @param array{ '$type': 'blob', 'ref': array{ '$link': string } } $value
     */
    private static function handleBlobDef(
        self $instance,
        string|int $key,
        array $value,
    ): void {
        $link = $value['ref']['$link'];
        $instance->{$key} = $link;
    }

    /**
     * @phpstan-assert-if-true string|int $value
     */
    private static function isDateTime(
        \ReflectionNamedType $propertyType,
        mixed $value,
    ): bool {
        if ($propertyType->getName() !== \DateTimeInterface::class) {
            return false;
        }

        if (!\is_string($value) && !is_numeric($value)) {
            return false;
        }

        return true;
    }

    private static function handleDateTime(
        self $instance,
        string|int $key,
        string|int $value,
    ): void {
        if (is_numeric($value)) {
            $instance->{$key} = new \DateTimeImmutable('@' . $value);
        } else {
            $instance->{$key} = new \DateTimeImmutable($value);
        }
    }
}
