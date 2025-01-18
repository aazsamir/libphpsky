<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\ResetPassword;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.server.resetPassword';

    public string $token;
    public string $password;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $token, string $password): self
    {
        $instance = new self();
        $instance->token = $token;
        $instance->password = $password;

        return $instance;
    }
}
