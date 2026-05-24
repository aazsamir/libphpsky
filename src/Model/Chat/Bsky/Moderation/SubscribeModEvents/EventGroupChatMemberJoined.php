<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\SubscribeModEvents;

/**
 * Fired when a member joins a group chat via an join link that does not require approval.
 * object
 */
class EventGroupChatMemberJoined implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'eventGroupChatMemberJoined';
    public const ID = 'chat.bsky.moderation.subscribeModEvents';

    /** @var string The DID of the person joining. */
    public string $actorDid;

    /** @var \DateTimeInterface When the group was originally created. */
    public \DateTimeInterface $convoCreatedAt;
    public string $convoId;
    public \DateTimeInterface $createdAt;

    /** @var int Current member count at the time of the event. */
    public int $groupMemberCount;
    public string $groupName;

    /** @var string The code of the join link used to join. */
    public string $joinLinkCode;

    /** @var string The DID of the group chat owner. */
    public string $ownerDid;
    public string $rev;

    /** @var bool Whether the joining member follows the group owner. */
    public bool $subjectFollowsOwner;

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
        return ['actorDid', 'convoCreatedAt', 'convoId', 'createdAt', 'groupMemberCount', 'groupName', 'joinLinkCode', 'ownerDid', 'rev', 'subjectFollowsOwner'];
    }

    public static function new(
        string $actorDid,
        \DateTimeInterface $convoCreatedAt,
        string $convoId,
        \DateTimeInterface $createdAt,
        int $groupMemberCount,
        string $groupName,
        string $joinLinkCode,
        string $ownerDid,
        string $rev,
        bool $subjectFollowsOwner,
    ): self {
        $instance = new self();
        $instance->actorDid = $actorDid;
        $instance->convoCreatedAt = $convoCreatedAt;
        $instance->convoId = $convoId;
        $instance->createdAt = $createdAt;
        $instance->groupMemberCount = $groupMemberCount;
        $instance->groupName = $groupName;
        $instance->joinLinkCode = $joinLinkCode;
        $instance->ownerDid = $ownerDid;
        $instance->rev = $rev;
        $instance->subjectFollowsOwner = $subjectFollowsOwner;

        return $instance;
    }
}
