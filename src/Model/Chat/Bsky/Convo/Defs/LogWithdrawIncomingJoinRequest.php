<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs;

/**
 * Event indicating a prospective member withdrew their join request. Only the owner gets this.
 * object
 */
class LogWithdrawIncomingJoinRequest implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'logWithdrawIncomingJoinRequest';
    public const ID = 'chat.bsky.convo.defs';

    public string $rev;
    public string $convoId;

    /** @var ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\Defs\ProfileViewBasic Prospective member who withdrew their join request. */
    public ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\Defs\ProfileViewBasic $member;

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
        return ['rev', 'convoId', 'member'];
    }

    public static function new(
        string $rev,
        string $convoId,
        ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\Defs\ProfileViewBasic $member = null,
    ): self {
        $instance = new self();
        $instance->rev = $rev;
        $instance->convoId = $convoId;
        if ($member !== null) {
            $instance->member = $member;
        }

        return $instance;
    }
}
