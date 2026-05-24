<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\SubscribeModEvents;

/**
 * Fired when a join request is approved by the group owner.
 * object
 */
class EventGroupChatJoinRequestApproved implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'eventGroupChatJoinRequestApproved';
    public const ID = 'chat.bsky.moderation.subscribeModEvents';

    /** @var string The DID of the owner approving the request. */
    public string $actorDid;

    /** @var \DateTimeInterface When the group was originally created. */
    public \DateTimeInterface $convoCreatedAt;
    public string $convoId;
    public \DateTimeInterface $createdAt;

    /** @var int Current member count at the time of the event. */
    public int $groupMemberCount;
    public string $groupName;

    /** @var string The DID of the group chat owner. */
    public string $ownerDid;
    public string $rev;

    /** @var string The DID of the member whose request was approved. */
    public string $subjectDid;

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
        return ['actorDid', 'convoCreatedAt', 'convoId', 'createdAt', 'groupMemberCount', 'groupName', 'ownerDid', 'rev', 'subjectDid'];
    }

    public static function new(
        string $actorDid,
        \DateTimeInterface $convoCreatedAt,
        string $convoId,
        \DateTimeInterface $createdAt,
        int $groupMemberCount,
        string $groupName,
        string $ownerDid,
        string $rev,
        string $subjectDid,
    ): self {
        $instance = new self();
        $instance->actorDid = $actorDid;
        $instance->convoCreatedAt = $convoCreatedAt;
        $instance->convoId = $convoId;
        $instance->createdAt = $createdAt;
        $instance->groupMemberCount = $groupMemberCount;
        $instance->groupName = $groupName;
        $instance->ownerDid = $ownerDid;
        $instance->rev = $rev;
        $instance->subjectDid = $subjectDid;

        return $instance;
    }
}
