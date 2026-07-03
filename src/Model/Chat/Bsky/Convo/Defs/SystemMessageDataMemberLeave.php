<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs;

/**
 * System message indicating a user voluntarily left the group convo.
 * object
 */
class SystemMessageDataMemberLeave implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'systemMessageDataMemberLeave';
    public const ID = 'chat.bsky.convo.defs';

    /** @var ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\SystemMessageReferredUser Current view of the member who left the group. */
    public ?SystemMessageReferredUser $member;

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
        return ['member'];
    }

    public static function new(?SystemMessageReferredUser $member = null): self
    {
        $instance = new self();
        if ($member !== null) {
            $instance->member = $member;
        }

        return $instance;
    }
}
