<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Temp\RequestPhoneVerification;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.temp.requestPhoneVerification';

    public string $phoneNumber;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $phoneNumber): self
    {
        $instance = new self();
        $instance->phoneNumber = $phoneNumber;

        return $instance;
    }
}
