<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs;

/**
 * object
 */
class GroupConvo implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'groupConvo';
    public const ID = 'chat.bsky.convo.defs';

    public \DateTimeInterface $createdAt;
    public ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Group\Defs\JoinLinkView $joinLink;

    /** @var ?int The total number of pending join requests for the group conversation. Only present for the owner. Capped at 21. */
    public ?int $joinRequestCount;

    /** @var ?string The lock status of the conversation. */
    public ?string $lockStatus;

    /** @var bool Whether the lock status is being forced by a moderation override (account inactivation or convo takedown) rather than the owner's own setting. */
    public bool $lockStatusModerationOverride;

    /** @var int The total number of members in the group conversation. */
    public int $memberCount;

    /** @var int The maximum number of members allowed in the group conversation. */
    public int $memberLimit;

    /** @var string The display name of the group conversation. */
    public string $name;

    /** @var ?int The number of unread join requests for the group conversation. Only present for the owner. */
    public ?int $unreadJoinRequestCount;

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
        return ['createdAt', 'lockStatus', 'lockStatusModerationOverride', 'memberCount', 'memberLimit', 'name'];
    }

    public static function new(
        \DateTimeInterface $createdAt,
        bool $lockStatusModerationOverride,
        int $memberCount,
        int $memberLimit,
        string $name,
        ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Group\Defs\JoinLinkView $joinLink = null,
        ?int $joinRequestCount = null,
        ?string $lockStatus = null,
        ?int $unreadJoinRequestCount = null,
    ): self {
        $instance = new self();
        $instance->createdAt = $createdAt;
        $instance->lockStatusModerationOverride = $lockStatusModerationOverride;
        $instance->memberCount = $memberCount;
        $instance->memberLimit = $memberLimit;
        $instance->name = $name;
        if ($joinLink !== null) {
            $instance->joinLink = $joinLink;
        }
        if ($joinRequestCount !== null) {
            $instance->joinRequestCount = $joinRequestCount;
        }
        if ($lockStatus !== null) {
            $instance->lockStatus = $lockStatus;
        }
        if ($unreadJoinRequestCount !== null) {
            $instance->unreadJoinRequestCount = $unreadJoinRequestCount;
        }

        return $instance;
    }
}
