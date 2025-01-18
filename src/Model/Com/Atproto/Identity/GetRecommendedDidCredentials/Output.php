<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Identity\GetRecommendedDidCredentials;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.identity.getRecommendedDidCredentials';

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
        ?array $rotationKeys = [],
        ?array $alsoKnownAs = [],
        mixed $verificationMethods = null,
        mixed $services = null,
    ): self {
        $instance = new self();
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
