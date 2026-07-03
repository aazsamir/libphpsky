<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs;

/**
 * A reference to another message within the same convo, used to indicate that a message is a reply to it.
 * object
 */
class ReplyRef implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'replyRef';
    public const ID = 'chat.bsky.convo.defs';

    public string $messageId;

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
        return ['messageId'];
    }

    public static function new(string $messageId): self
    {
        $instance = new self();
        $instance->messageId = $messageId;

        return $instance;
    }
}
