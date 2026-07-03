<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\Defs;

/**
 * Data specific to a group conversation, for moderation purposes. Unlike chat.bsky.convo.defs#groupConvo, it does not include viewer-specific data (such as unreadJoinRequestCount), since the requester is a moderator and not a member of the conversation.
 * object
 */
class GroupConvo implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'groupConvo';
    public const ID = 'chat.bsky.moderation.defs';

    public \DateTimeInterface $createdAt;
    public ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Group\Defs\JoinLinkView $joinLink;

    /** @var int The total number of pending join requests for the group conversation. This information is only visible to the owner and to moderators. Capped at 21. */
    public int $joinRequestCount;

    /** @var ?string The lock status of the conversation. */
    public ?string $lockStatus;

    /** @var int The total number of members in the group conversation. */
    public int $memberCount;

    /** @var int The maximum number of members allowed in the group conversation. */
    public int $memberLimit;

    /** @var string The display name of the group conversation. */
    public string $name;

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
        return ['createdAt', 'joinRequestCount', 'lockStatus', 'memberCount', 'memberLimit', 'name'];
    }

    public static function new(
        \DateTimeInterface $createdAt,
        int $joinRequestCount,
        int $memberCount,
        int $memberLimit,
        string $name,
        ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Group\Defs\JoinLinkView $joinLink = null,
        ?string $lockStatus = null,
    ): self {
        $instance = new self();
        $instance->createdAt = $createdAt;
        $instance->joinRequestCount = $joinRequestCount;
        $instance->memberCount = $memberCount;
        $instance->memberLimit = $memberLimit;
        $instance->name = $name;
        if ($joinLink !== null) {
            $instance->joinLink = $joinLink;
        }
        if ($lockStatus !== null) {
            $instance->lockStatus = $lockStatus;
        }

        return $instance;
    }
}
