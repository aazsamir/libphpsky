<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\RequestPasswordReset;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.server.requestPasswordReset';

    public string $email;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $email): self
    {
        $instance = new self();
        $instance->email = $email;

        return $instance;
    }
}