<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\ConfirmEmail;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.server.confirmEmail';

    public string $email;
    public string $token;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $email, string $token): self
    {
        $instance = new self();
        $instance->email = $email;
        $instance->token = $token;

        return $instance;
    }
}
