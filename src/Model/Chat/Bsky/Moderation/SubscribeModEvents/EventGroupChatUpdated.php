<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\SubscribeModEvents;

/**
 * Fired when a group chat's metadata or status changes.
 * object
 */
class EventGroupChatUpdated implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'eventGroupChatUpdated';
    public const ID = 'chat.bsky.moderation.subscribeModEvents';

    /** @var string The DID of the actor performing the action (the owner). */
    public string $actorDid;

    /** @var \DateTimeInterface When the group was originally created. */
    public \DateTimeInterface $convoCreatedAt;
    public string $convoId;
    public \DateTimeInterface $createdAt;

    /** @var int Current member count at the time of the event. */
    public int $groupMemberCount;

    /** @var string Current group name. */
    public string $groupName;

    /** @var ?string The code of the join link. Only present when updateType is join-link-related. */
    public ?string $joinLinkCode;

    /** @var ?bool Whether the join link is restricted to followers of the owner. Only present when updateType is join-link-related. */
    public ?bool $joinLinkFollowersOnly;

    /** @var ?bool Whether the join link requires owner approval to join. Only present when updateType is join-link-related. */
    public ?bool $joinLinkRequiresApproval;

    /** @var ?string Why the group was locked. Only present when updateType is 'locked'. */
    public ?string $lockReason;

    /** @var ?string The new group name. Only present when updateType is 'name_changed'. */
    public ?string $newName;

    /** @var ?string The previous group name. Only present when updateType is 'name_changed'. */
    public ?string $oldName;

    /** @var string The DID of the group chat owner. */
    public string $ownerDid;
    public string $rev;

    /** @var string What changed. */
    public string $updateType;

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
        return ['actorDid', 'convoCreatedAt', 'convoId', 'createdAt', 'groupMemberCount', 'groupName', 'ownerDid', 'rev', 'updateType'];
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
        string $updateType,
        ?string $joinLinkCode = null,
        ?bool $joinLinkFollowersOnly = null,
        ?bool $joinLinkRequiresApproval = null,
        ?string $lockReason = null,
        ?string $newName = null,
        ?string $oldName = null,
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
        $instance->updateType = $updateType;
        if ($joinLinkCode !== null) {
            $instance->joinLinkCode = $joinLinkCode;
        }
        if ($joinLinkFollowersOnly !== null) {
            $instance->joinLinkFollowersOnly = $joinLinkFollowersOnly;
        }
        if ($joinLinkRequiresApproval !== null) {
            $instance->joinLinkRequiresApproval = $joinLinkRequiresApproval;
        }
        if ($lockReason !== null) {
            $instance->lockReason = $lockReason;
        }
        if ($newName !== null) {
            $instance->newName = $newName;
        }
        if ($oldName !== null) {
            $instance->oldName = $oldName;
        }

        return $instance;
    }
}
