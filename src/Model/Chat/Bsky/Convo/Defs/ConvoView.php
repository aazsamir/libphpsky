<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs;

/**
 * object
 */
class ConvoView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'convoView';
    public const ID = 'chat.bsky.convo.defs';

    public string $id;
    public string $rev;

    /** @var array<\Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\Defs\ProfileViewBasic> */
    public array $members = [];

    /** @var \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\MessageView|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\DeletedMessageView|null */
    public mixed $lastMessage = null;
    public bool $muted;
    public ?bool $opened = null;
    public int $unreadCount;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\Defs\ProfileViewBasic> $members
     */
    public static function new(
        string $id,
        string $rev,
        array $members,
        bool $muted,
        int $unreadCount,
        MessageView|DeletedMessageView|null $lastMessage = null,
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
