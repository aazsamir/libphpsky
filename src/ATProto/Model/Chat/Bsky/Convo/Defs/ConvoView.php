<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\Defs;

/**
 * object
 */
class ConvoView implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'convoView';
    public const ID = 'chat.bsky.convo.defs';

    public string $id;
    public string $rev;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Actor\Defs\ProfileViewBasic[] */
    public array $members = [];

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\Defs\MessageView|\Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\Defs\DeletedMessageView */
    public mixed $lastMessage = null;
    public bool $muted;
    public ?bool $opened = null;
    public int $unreadCount;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param \Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Actor\Defs\ProfileViewBasic[] $members
     */
    public static function new(
        string $id,
        string $rev,
        array $members,
        bool $muted,
        int $unreadCount,
        mixed $lastMessage = null,
        ?bool $opened = null,
    ): self {
        $instance = new self();
        $instance->id = $id;
        $instance->rev = $rev;
        $instance->members = $members;
        $instance->muted = $muted;
        $instance->unreadCount = $unreadCount;
        $instance->lastMessage = $lastMessage;
        $instance->opened = $opened;

        return $instance;
    }
}
