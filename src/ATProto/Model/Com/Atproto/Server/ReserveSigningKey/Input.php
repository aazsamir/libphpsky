<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\ReserveSigningKey;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.server.reserveSigningKey';

    public ?string $did = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(?string $did = null): self
    {
        $instance = new self();
        $instance->did = $did;

        return $instance;
    }
}
