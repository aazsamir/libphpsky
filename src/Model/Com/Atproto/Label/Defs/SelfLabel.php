<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs;

/**
 * object
 */
class SelfLabel implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'selfLabel';
    public const ID = 'com.atproto.label.defs';

    public string $val;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $val): self
    {
        $instance = new self();
        $instance->val = $val;

        return $instance;
    }
}
