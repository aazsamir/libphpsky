<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\GetServiceAuth;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

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
