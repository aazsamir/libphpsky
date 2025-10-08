<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Temp\DereferenceScope;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.temp.dereferenceScope';

    /** @var string The full oauth permission scope */
    public string $scope;

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public static function nullable(): array
    {
        return [];
    }

    public static function required(): array
    {
        return ['scope'];
    }

    public static function new(string $scope): self
    {
        $instance = new self();
        $instance->scope = $scope;

        return $instance;
    }
}
