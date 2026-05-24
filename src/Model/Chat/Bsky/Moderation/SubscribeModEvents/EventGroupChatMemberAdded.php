<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\SubscribeModEvents;

/**
 * Fired when a member is added to a group chat. Note that members are added in the 'request' state.
 * object
 */
class EventGroupChatMemberAdded implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'eventGroupChatMemberAdded';
    public const ID = 'chat.bsky.moderation.subscribeModEvents';

    /** @var string The DID of the actor performing the action. For this event, same as ownerDid. */
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

    /** @var int The number of members who have not yet accepted the convo. */
    public int $requestMembersCount;
    public string $rev;

    /** @var string The DID of the member who was added. */
    public string $subjectDid;

    /** @var bool Whether the added member follows the group owner. */
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
        return ['actorDid', 'convoCreatedAt', 'convoId', 'createdAt', 'groupMemberCount', 'groupName', 'ownerDid', 'requestMembersCount', 'rev', 'subjectDid', 'subjectFollowsOwner'];
    }

    public static function new(
        string $actorDid,
        \DateTimeInterface $convoCreatedAt,
        string $convoId,
        \DateTimeInterface $createdAt,
        int $groupMemberCount,
        string $groupName,
        string $ownerDid,
        int $requestMembersCount,
        string $rev,
        string $subjectDid,
        bool $subjectFollowsOwner,
    ): self {
        $instance = new self();
        $instance->actorDid = $actorDid;
        $instance->convoCreatedAt = $convoCreatedAt;
        $instance->convoId = $convoId;
        $instance->createdAt = $createdAt;
        $instance->groupMemberCount = $groupMemberCount;
        $instance->groupName = $groupName;
        $instance->ownerDid = $ownerDid;
        $instance->requestMembersCount = $requestMembersCount;
        $instance->rev = $rev;
        $instance->subjectDid = $subjectDid;
        $instance->subjectFollowsOwner = $subjectFollowsOwner;

        return $instance;
    }
}
