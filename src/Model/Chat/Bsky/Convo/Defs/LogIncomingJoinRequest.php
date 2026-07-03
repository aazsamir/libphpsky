<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs;

/**
 * Event indicating a join request was made to a group the viewer owns. Only the owner gets this.
 * object
 */
class LogIncomingJoinRequest implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'logIncomingJoinRequest';
    public const ID = 'chat.bsky.convo.defs';

    public string $rev;
    public string $convoId;

    /** @var ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\Defs\ProfileViewBasic Prospective member who requested to join. */
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
