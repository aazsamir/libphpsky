<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Identity\SignPlcOperation;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.identity.signPlcOperation';

    public ?string $token;

    /** @var array<string>|null */
    public ?array $rotationKeys = [];

    /** @var array<string>|null */
    public ?array $alsoKnownAs = [];
    public mixed $verificationMethods;
    public mixed $services;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<string> $rotationKeys
     * @param array<string> $alsoKnownAs
     */
    public static function new(
        ?string $token = null,
        ?array $rotationKeys = [],
        ?array $alsoKnownAs = [],
        mixed $verificationMethods = null,
        mixed $services = null,
    ): self {
        $instance = new self();
        $instance->token = $token;
        $instance->rotationKeys = $rotationKeys;
        $instance->alsoKnownAs = $alsoKnownAs;
        $instance->verificationMethods = $verificationMethods;
        $instance->services = $services;

        return $instance;
    }
}
