<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Admin\Defs;

/**
 * object
 */
class ThreatSignature implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'threatSignature';
    public const ID = 'com.atproto.admin.defs';

    public string $property;
    public string $value;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $property, string $value): self
    {
        $instance = new self();
        $instance->property = $property;
        $instance->value = $value;

        return $instance;
    }
}
