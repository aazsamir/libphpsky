<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs;

/**
 * object
 */
class DeletedMessageView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'deletedMessageView';
    public const ID = 'chat.bsky.convo.defs';

    public string $id;
    public string $rev;
    public ?MessageViewSender $sender;
    public \DateTimeInterface $sentAt;

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
        return ['id', 'rev', 'sender', 'sentAt'];
    }

    public static function new(
        string $id,
        string $rev,
        \DateTimeInterface $sentAt,
        ?MessageViewSender $sender = null,
    ): self {
        $instance = new self();
        $instance->id = $id;
        $instance->rev = $rev;
        $instance->sentAt = $sentAt;
        if ($sender !== null) {
            $instance->sender = $sender;
        }

        return $instance;
    }
}
