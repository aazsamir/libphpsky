<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Temp\AddReservedHandle;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.temp.addReservedHandle';

    public string $handle;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $handle): self
    {
        $instance = new self();
        $instance->handle = $handle;

        return $instance;
    }
}
