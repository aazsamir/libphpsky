<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Temp\AddReservedHandle;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

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
