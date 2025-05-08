<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Verification\Defs;

/**
 * Verification data for the associated subject.
 * object
 */
class VerificationView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'verificationView';
    public const ID = 'tools.ozone.verification.defs';

    /** @var string The user who issued this verification. */
    public string $issuer;

    /** @var string The AT-URI of the verification record. */
    public string $uri;

    /** @var string The subject of the verification. */
    public string $subject;

    /** @var string Handle of the subject the verification applies to at the moment of verifying, which might not be the same at the time of viewing. The verification is only valid if the current handle matches the one at the time of verifying. */
    public string $handle;

    /** @var string Display name of the subject the verification applies to at the moment of verifying, which might not be the same at the time of viewing. The verification is only valid if the current displayName matches the one at the time of verifying. */
    public string $displayName;

    /** @var \DateTimeInterface Timestamp when the verification was created. */
    public \DateTimeInterface $createdAt;

    /** @var ?string Describes the reason for revocation, also indicating that the verification is no longer valid. */
    public ?string $revokeReason;

    /** @var ?\DateTimeInterface Timestamp when the verification was revoked. */
    public ?\DateTimeInterface $revokedAt;

    /** @var ?string The user who revoked this verification. */
    public ?string $revokedBy;
    public mixed $subjectProfile;
    public mixed $issuerProfile;

    /** @var \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\RepoViewDetail|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\RepoViewNotFound|null */
    public mixed $subjectRepo;

    /** @var \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\RepoViewDetail|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\RepoViewNotFound|null */
    public mixed $issuerRepo;

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
        return ['issuer', 'uri', 'subject', 'handle', 'displayName', 'createdAt'];
    }

    public static function new(
        string $issuer,
        string $uri,
        string $subject,
        string $handle,
        string $displayName,
        \DateTimeInterface $createdAt,
        ?string $revokeReason = null,
        ?\DateTimeInterface $revokedAt = null,
        ?string $revokedBy = null,
        mixed $subjectProfile = null,
        mixed $issuerProfile = null,
        \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\RepoViewDetail|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\RepoViewNotFound|null $subjectRepo = null,
        \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\RepoViewDetail|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\RepoViewNotFound|null $issuerRepo = null,
    ): self {
        $instance = new self();
        $instance->issuer = $issuer;
        $instance->uri = $uri;
        $instance->subject = $subject;
        $instance->handle = $handle;
        $instance->displayName = $displayName;
        $instance->createdAt = $createdAt;
        if ($revokeReason !== null) {
            $instance->revokeReason = $revokeReason;
        }
        if ($revokedAt !== null) {
            $instance->revokedAt = $revokedAt;
        }
        if ($revokedBy !== null) {
            $instance->revokedBy = $revokedBy;
        }
        if ($subjectProfile !== null) {
            $instance->subjectProfile = $subjectProfile;
        }
        if ($issuerProfile !== null) {
            $instance->issuerProfile = $issuerProfile;
        }
        if ($subjectRepo !== null) {
            $instance->subjectRepo = $subjectRepo;
        }
        if ($issuerRepo !== null) {
            $instance->issuerRepo = $issuerRepo;
        }

        return $instance;
    }
}
