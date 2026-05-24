<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\SubscribeModEvents;

/**
 * Fire when a group chat is created.
 * object
 */
class EventGroupChatCreated implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'eventGroupChatCreated';
    public const ID = 'chat.bsky.moderation.subscribeModEvents';

    /** @var string The DID of the actor performing the action. For this event, same as ownerDid. */
    public string $actorDid;

    /** @var \DateTimeInterface When the group was originally created. */
    public \DateTimeInterface $convoCreatedAt;
    public string $convoId;
    public \DateTimeInterface $createdAt;

    /** @var int Current member count at the time of the event. */
    public int $groupMemberCount;

    /** @var string The name set at creation time. */
    public string $groupName;

    /** @var array<string> DIDs of everyone added at creation time. */
    public array $initialMemberDids = [];

    /** @var string The DID of the group chat owner. */
    public string $ownerDid;
    public string $rev;

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
        return ['actorDid', 'convoCreatedAt', 'convoId', 'createdAt', 'groupMemberCount', 'groupName', 'initialMemberDids', 'ownerDid', 'rev'];
    }

    /**
     * @param array<string> $initialMemberDids
     */
    public static function new(
        string $actorDid,
        \DateTimeInterface $convoCreatedAt,
        string $convoId,
        \DateTimeInterface $createdAt,
        int $groupMemberCount,
        string $groupName,
        array $initialMemberDids,
        string $ownerDid,
        string $rev,
    ): self {
        $instance = new self();
        $instance->actorDid = $actorDid;
        $instance->convoCreatedAt = $convoCreatedAt;
        $instance->convoId = $convoId;
        $instance->createdAt = $createdAt;
        $instance->groupMemberCount = $groupMemberCount;
        $instance->groupName = $groupName;
        $instance->initialMemberDids = $initialMemberDids;
        $instance->ownerDid = $ownerDid;
        $instance->rev = $rev;

        return $instance;
    }
}
