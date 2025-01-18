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

    /**
     * @param array<string> $rotationKeys
     * @param array<string> $alsoKnownAs
     */
    public static function new(
        ?array $rotationKeys = null,
        ?array $alsoKnownAs = null,
        mixed $verificationMethods = null,
        mixed $services = null,
    ): self {
        $instance = new self();
        $instance->rotationKeys = $rotationKeys;
        $instance->alsoKnownAs = $alsoKnownAs;
        $instance->verificationMethods = $verificationMethods;
        $instance->services = $services;

        return $instance;
    }
}
