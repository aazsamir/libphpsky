<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Identity\SignPlcOperation;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.identity.signPlcOperation';

    public ?string $token = null;

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
