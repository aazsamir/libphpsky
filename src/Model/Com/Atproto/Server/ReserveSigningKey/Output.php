<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\ReserveSigningKey;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.server.reserveSigningKey';

    public string $signingKey;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $signingKey): self
    {
        $instance = new self();
        $instance->signingKey = $signingKey;

        return $instance;
    }
}
