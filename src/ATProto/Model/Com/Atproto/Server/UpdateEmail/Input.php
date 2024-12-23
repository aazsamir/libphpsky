<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\UpdateEmail;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.server.updateEmail';

    public string $email;
    public ?bool $emailAuthFactor = null;
    public ?string $token = null;

    public static function id(): string
    {
        return self::ID;
    }
}
