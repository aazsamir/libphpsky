<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\RevokeAppPassword;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.server.revokeAppPassword';

    public string $name;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $name): self
    {
        $instance = new self();
        $instance->name = $name;

        return $instance;
    }
}
