<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Signature\Defs;

/**
 * object
 */
class SigDetail implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'sigDetail';
    public const ID = 'tools.ozone.signature.defs';

    public string $property;
    public string $value;

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
        return ['property', 'value'];
    }

    public static function new(string $property, string $value): self
    {
        $instance = new self();
        $instance->property = $property;
        $instance->value = $value;

        return $instance;
    }
}
