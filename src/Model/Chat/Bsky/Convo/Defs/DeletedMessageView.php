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
        $instance->sender = $sender;

        return $instance;
    }
}
