<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\ReserveSigningKey;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.server.reserveSigningKey';

    public ?string $did;

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
