<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\CreateAccount;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.server.createAccount';

    public ?string $email = null;
    public string $handle;
    public ?string $did = null;
    public ?string $inviteCode = null;
    public ?string $verificationCode = null;
    public ?string $verificationPhone = null;
    public ?string $password = null;
    public ?string $recoveryKey = null;
    public mixed $plcOp = null;

    public static function id(): string
    {
        return self::ID;
    }
}
