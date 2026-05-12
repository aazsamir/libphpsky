<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\SubscribeModEvents;

/**
 * object
 */
class EventConvoFirstMessage implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'eventConvoFirstMessage';
    public const ID = 'chat.bsky.moderation.subscribeModEvents';

    public string $convoId;
    public \DateTimeInterface $createdAt;
    public ?string $messageId;

    /** @var array<string> The list of DIDs message recipients. Does not include the sender, which is in the `user` field */
    public array $recipients = [];
    public string $rev;

    /** @var string The DID of the message author. */
    public string $user;

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
        return ['createdAt', 'rev', 'convoId', 'user', 'recipients'];
    }

    /**
     * @param array<string> $recipients
     */
    public static function new(
        string $convoId,
        \DateTimeInterface $createdAt,
        array $recipients,
        string $rev,
        string $user,
        ?string $messageId = null,
    ): self {
        $instance = new self();
        $instance->convoId = $convoId;
        $instance->createdAt = $createdAt;
        $instance->recipients = $recipients;
        $instance->rev = $rev;
        $instance->user = $user;
        if ($messageId !== null) {
            $instance->messageId = $messageId;
        }

        return $instance;
    }
}
