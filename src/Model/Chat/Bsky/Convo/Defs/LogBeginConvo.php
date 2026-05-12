<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs;

/**
 * Event indicating a convo containing the viewer was started. Can be direct or group. When a member is added to a group convo, they also get this event.
 * object
 */
class LogBeginConvo implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'logBeginConvo';
    public const ID = 'chat.bsky.convo.defs';

    public string $rev;
    public string $convoId;

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
        return ['rev', 'convoId'];
    }

    public static function new(string $rev, string $convoId): self
    {
        $instance = new self();
        $instance->rev = $rev;
        $instance->convoId = $convoId;

        return $instance;
    }
}
