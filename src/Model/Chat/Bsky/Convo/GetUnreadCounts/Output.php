<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\GetUnreadCounts;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'chat.bsky.convo.getUnreadCounts';

    /** @var int Number of unread, unlocked accepted convos. Counts convos with unread messages and unread join requests. Capped at 31, where 31 means more than 30. */
    public int $unreadAcceptedConvos;

    /** @var int Number of unread, unlocked request convos. Includes convos with unread messages, but not with unread join request, since only the owner of a group has join requests to read, and the group would necessarily be accepted. Capped at 11, where 11 means more than 10. */
    public int $unreadRequestConvos;

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
        return ['unreadAcceptedConvos', 'unreadRequestConvos'];
    }

    public static function new(int $unreadAcceptedConvos, int $unreadRequestConvos): self
    {
        $instance = new self();
        $instance->unreadAcceptedConvos = $unreadAcceptedConvos;
        $instance->unreadRequestConvos = $unreadRequestConvos;

        return $instance;
    }
}
