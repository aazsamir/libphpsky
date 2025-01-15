<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\SendMessage;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'chat.bsky.convo.sendMessage';

    public string $convoId;
    public ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\MessageInput $message = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        string $convoId,
        ?\Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\MessageInput $message = null,
    ): self {
        $instance = new self();
        $instance->convoId = $convoId;
        $instance->message = $message;

        return $instance;
    }
}
