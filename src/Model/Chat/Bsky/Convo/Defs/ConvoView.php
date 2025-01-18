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
    public mixed $lastMessage;
    public bool $muted;
    public ?bool $opened;
    public int $unreadCount;

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
        return ['id', 'rev', 'members', 'muted', 'unreadCount'];
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
        if ($lastMessage !== null) {
            $instance->lastMessage = $lastMessage;
        }
        if ($opened !== null) {
            $instance->opened = $opened;
        }

        return $instance;
    }
}
