<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateAccount;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.server.createAccount';

    public ?string $email;
    public string $handle;
    public ?string $did;
    public ?string $inviteCode;
    public ?string $verificationCode;
    public ?string $verificationPhone;
    public ?string $password;
    public ?string $recoveryKey;
    public mixed $plcOp;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        string $handle,
        ?string $email = null,
        ?string $did = null,
        ?string $inviteCode = null,
        ?string $verificationCode = null,
        ?string $verificationPhone = null,
        ?string $password = null,
        ?string $recoveryKey = null,
        mixed $plcOp = null,
    ): self {
        $instance = new self();
        $instance->handle = $handle;
        $instance->email = $email;
        $instance->did = $did;
        $instance->inviteCode = $inviteCode;
        $instance->verificationCode = $verificationCode;
        $instance->verificationPhone = $verificationPhone;
        $instance->password = $password;
        $instance->recoveryKey = $recoveryKey;
        $instance->plcOp = $plcOp;

        return $instance;
    }
}
