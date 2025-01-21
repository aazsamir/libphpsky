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

    /** @var ?string A token received through com.atproto.identity.requestPlcOperationSignature */
    public ?string $token;

    /** @var ?array<string> */
    public ?array $rotationKeys = [];

    /** @var ?array<string> */
    public ?array $alsoKnownAs = [];
    public mixed $verificationMethods;
    public mixed $services;

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
        return [];
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
        if ($token !== null) {
            $instance->token = $token;
        }
        if ($rotationKeys !== null) {
            $instance->rotationKeys = $rotationKeys;
        }
        if ($alsoKnownAs !== null) {
            $instance->alsoKnownAs = $alsoKnownAs;
        }
        if ($verificationMethods !== null) {
            $instance->verificationMethods = $verificationMethods;
        }
        if ($services !== null) {
            $instance->services = $services;
        }

        return $instance;
    }
}
