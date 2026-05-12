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

    /** @var array<\Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\Defs\ProfileViewBasic> Members of this conversation. For direct convos, it will be an immutable list of the 2 members. For group convos, it will a list of important members (the first few members, the viewer, the member who invited the viewer, the member who sent the last message, the member who sent the last reaction), but will not contain the full list of members. Use chat.bsky.convo.getConvoMembers to list all members. */
    public array $members = [];

    /** @var \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\MessageView|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\DeletedMessageView|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\SystemMessageView|null */
    public mixed $lastMessage;

    /** @var \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\MessageAndReactionView|null */
    public mixed $lastReaction;
    public bool $muted;

    /** @var ?string Convo status for the viewer member (not the convo itself). */
    public ?string $status;
    public int $unreadCount;

    /** @var \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\DirectConvo|\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\GroupConvo|null Union field that has data specific to different kinds of convos. */
    public mixed $kind;

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
        MessageView|DeletedMessageView|SystemMessageView|null $lastMessage = null,
        ?MessageAndReactionView $lastReaction = null,
        ?string $status = null,
        DirectConvo|GroupConvo|null $kind = null,
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
        if ($lastReaction !== null) {
            $instance->lastReaction = $lastReaction;
        }
        if ($status !== null) {
            $instance->status = $status;
        }
        if ($kind !== null) {
            $instance->kind = $kind;
        }

        return $instance;
    }
}
