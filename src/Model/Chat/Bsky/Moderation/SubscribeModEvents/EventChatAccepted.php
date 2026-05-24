<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\SubscribeModEvents;

/**
 * Fired when a user accepts a chat convo, either explicitly or by sending a message.
 * object
 */
class EventChatAccepted implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'eventChatAccepted';
    public const ID = 'chat.bsky.moderation.subscribeModEvents';

    /** @var string The DID of the person accepting the convo. */
    public string $actorDid;

    /** @var \DateTimeInterface When the convo was originally created. */
    public \DateTimeInterface $convoCreatedAt;
    public string $convoId;
    public \DateTimeInterface $createdAt;

    /** @var ?int Current member count at the time of the event. Only present for group convos. */
    public ?int $groupMemberCount;

    /** @var ?string The name of the group chat. Only present for group convos. */
    public ?string $groupName;

    /** @var string How the convo was accepted. */
    public string $method;

    /** @var ?string The DID of the group chat owner. Only present for group convos. */
    public ?string $ownerDid;
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
        return ['actorDid', 'convoCreatedAt', 'convoId', 'createdAt', 'method', 'rev'];
    }

    public static function new(
        string $actorDid,
        \DateTimeInterface $convoCreatedAt,
        string $convoId,
        \DateTimeInterface $createdAt,
        string $method,
        string $rev,
        ?int $groupMemberCount = null,
        ?string $groupName = null,
        ?string $ownerDid = null,
    ): self {
        $instance = new self();
        $instance->actorDid = $actorDid;
        $instance->convoCreatedAt = $convoCreatedAt;
        $instance->convoId = $convoId;
        $instance->createdAt = $createdAt;
        $instance->method = $method;
        $instance->rev = $rev;
        if ($groupMemberCount !== null) {
            $instance->groupMemberCount = $groupMemberCount;
        }
        if ($groupName !== null) {
            $instance->groupName = $groupName;
        }
        if ($ownerDid !== null) {
            $instance->ownerDid = $ownerDid;
        }

        return $instance;
    }
}
