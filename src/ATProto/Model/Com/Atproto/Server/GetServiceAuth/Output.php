<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\GetServiceAuth;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.server.getServiceAuth';

    public string $token;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $token): self
    {
        $instance = new self();
        $instance->token = $token;

        return $instance;
    }
}
