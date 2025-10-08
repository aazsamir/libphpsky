<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Verification\GrantVerifications;

/**
 * object
 */
class VerificationInput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'verificationInput';
    public const ID = 'tools.ozone.verification.grantVerifications';

    /** @var string The did of the subject being verified */
    public string $subject;

    /** @var string Handle of the subject the verification applies to at the moment of verifying. */
    public string $handle;

    /** @var string Display name of the subject the verification applies to at the moment of verifying. */
    public string $displayName;

    /** @var ?\DateTimeInterface Timestamp for verification record. Defaults to current time when not specified. */
    public ?\DateTimeInterface $createdAt;

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
        return ['subject', 'handle', 'displayName'];
    }

    public static function new(
        string $subject,
        string $handle,
        string $displayName,
        ?\DateTimeInterface $createdAt = null,
    ): self {
        $instance = new self();
        $instance->subject = $subject;
        $instance->handle = $handle;
        $instance->displayName = $displayName;
        if ($createdAt !== null) {
            $instance->createdAt = $createdAt;
        }

        return $instance;
    }
}
