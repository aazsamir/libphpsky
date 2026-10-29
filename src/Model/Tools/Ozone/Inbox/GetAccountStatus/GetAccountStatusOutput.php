<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\GetAccountStatus;

/**
 * object
 */
class GetAccountStatusOutput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.inbox.getAccountStatus';

    /** @var string DID of the moderation service returning this status. */
    public string $src;
    public string $standing;

    /** @var \DateTimeInterface Newest account-status update or strike timestamp used to derive this standing, or the Unix epoch when neither exists. This is not a standing-transition timestamp; expiry can change standing without changing this value. */
    public \DateTimeInterface $updatedAt;

    /** @var ?\DateTimeInterface Time at which the current suspension expires. Present only for a temporary suspension. */
    public ?\DateTimeInterface $expiresAt;

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
        return ['src', 'standing', 'updatedAt'];
    }

    public static function new(
        string $src,
        string $standing,
        \DateTimeInterface $updatedAt,
        ?\DateTimeInterface $expiresAt = null,
    ): self {
        $instance = new self();
        $instance->src = $src;
        $instance->standing = $standing;
        $instance->updatedAt = $updatedAt;
        if ($expiresAt !== null) {
            $instance->expiresAt = $expiresAt;
        }

        return $instance;
    }
}
