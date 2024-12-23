<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Identity\GetRecommendedDidCredentials;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.identity.getRecommendedDidCredentials';

    /** @var string[] */
    public ?array $rotationKeys = [];

    /** @var string[] */
    public ?array $alsoKnownAs = [];
    public mixed $verificationMethods = null;
    public mixed $services = null;

    public static function id(): string
    {
        return self::ID;
    }
}
