<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\ReserveSigningKey;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.server.reserveSigningKey';

    /** @var string The public key for the reserved signing key, in did:key serialization. */
    public string $signingKey;

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public static function nullable(): array
    {
        return [];
    }

    public static function required(): array
    {
        return ['signingKey'];
    }

    public static function new(string $signingKey): self
    {
        $instance = new self();
        $instance->signingKey = $signingKey;

        return $instance;
    }
}
