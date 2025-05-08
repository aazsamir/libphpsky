<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * Represents the verification information about the user this object is attached to.
 * object
 */
class VerificationState implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'verificationState';
    public const ID = 'app.bsky.actor.defs';

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\VerificationView> All verifications issued by trusted verifiers on behalf of this user. Verifications by untrusted verifiers are not included. */
    public array $verifications = [];

    /** @var string The user's status as a verified account. */
    public string $verifiedStatus;

    /** @var string The user's status as a trusted verifier. */
    public string $trustedVerifierStatus;

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
        return ['verifications', 'verifiedStatus', 'trustedVerifierStatus'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\VerificationView> $verifications
     */
    public static function new(array $verifications, string $verifiedStatus, string $trustedVerifierStatus): self
    {
        $instance = new self();
        $instance->verifications = $verifications;
        $instance->verifiedStatus = $verifiedStatus;
        $instance->trustedVerifierStatus = $trustedVerifierStatus;

        return $instance;
    }
}
