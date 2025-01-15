<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\DeleteAccount;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.server.deleteAccount';

    public string $did;
    public string $password;
    public string $token;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $did, string $password, string $token): self
    {
        $instance = new self();
        $instance->did = $did;
        $instance->password = $password;
        $instance->token = $token;

        return $instance;
    }
}
