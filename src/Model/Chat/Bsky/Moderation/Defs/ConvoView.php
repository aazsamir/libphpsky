<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\Defs;

/**
 * [NOTE: This is under active development and should be considered unstable while this note is here]. A view of a conversation for moderation purposes. Unlike chat.bsky.convo.defs#convoView, it does not include viewer-specific data (such as muted, unreadCount, status, lastMessage, lastReaction), since the requester is a moderator and not a member of the conversation. The member list is not included; use chat.bsky.moderation.getConvoMembers to list members.
 * object
 */
class ConvoView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'convoView';
    public const ID = 'chat.bsky.moderation.defs';

    public string $id;
    public string $rev;

    /** @var \Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\Defs\DirectConvo|\Aazsamir\Libphpsky\Model\Chat\Bsky\Moderation\Defs\GroupConvo|null Union field that has data specific to different kinds of convos. */
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
        return ['id', 'rev'];
    }

    public static function new(string $id, string $rev, DirectConvo|GroupConvo|null $kind = null): self
    {
        $instance = new self();
        $instance->id = $id;
        $instance->rev = $rev;
        if ($kind !== null) {
            $instance->kind = $kind;
        }

        return $instance;
    }
}
