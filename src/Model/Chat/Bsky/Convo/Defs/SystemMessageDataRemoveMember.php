<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs;

/**
 * System message indicating a user was removed from the group convo.
 * object
 */
class SystemMessageDataRemoveMember implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'systemMessageDataRemoveMember';
    public const ID = 'chat.bsky.convo.defs';

    /** @var ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\SystemMessageReferredUser Current view of the member who was removed. */
    public ?SystemMessageReferredUser $member;
    public ?SystemMessageReferredUser $removedBy;

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
        return ['member', 'removedBy'];
    }

    public static function new(
        ?SystemMessageReferredUser $member = null,
        ?SystemMessageReferredUser $removedBy = null,
    ): self {
        $instance = new self();
        if ($member !== null) {
            $instance->member = $member;
        }
        if ($removedBy !== null) {
            $instance->removedBy = $removedBy;
        }

        return $instance;
    }
}
