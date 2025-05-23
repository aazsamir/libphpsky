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

    /** @var string Requested handle for the account. */
    public string $handle;

    /** @var ?string Pre-existing atproto DID, being imported to a new account. */
    public ?string $did;
    public ?string $inviteCode;
    public ?string $verificationCode;
    public ?string $verificationPhone;

    /** @var ?string Initial account password. May need to meet instance-specific password strength requirements. */
    public ?string $password;

    /** @var ?string DID PLC rotation key (aka, recovery key) to be included in PLC creation operation. */
    public ?string $recoveryKey;
    public mixed $plcOp;

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
        return ['handle'];
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
        if ($email !== null) {
            $instance->email = $email;
        }
        if ($did !== null) {
            $instance->did = $did;
        }
        if ($inviteCode !== null) {
            $instance->inviteCode = $inviteCode;
        }
        if ($verificationCode !== null) {
            $instance->verificationCode = $verificationCode;
        }
        if ($verificationPhone !== null) {
            $instance->verificationPhone = $verificationPhone;
        }
        if ($password !== null) {
            $instance->password = $password;
        }
        if ($recoveryKey !== null) {
            $instance->recoveryKey = $recoveryKey;
        }
        if ($plcOp !== null) {
            $instance->plcOp = $plcOp;
        }

        return $instance;
    }
}
