<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\SendMessageBatch;

/**
 * object
 */
class BatchItem implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'batchItem';
    public const ID = 'chat.bsky.convo.sendMessageBatch';

    public string $convoId;
    public ?\Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\Defs\MessageInput $message = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        string $convoId,
        ?\Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\Defs\MessageInput $message = null,
    ): self {
        $instance = new self();
        $instance->convoId = $convoId;
        $instance->message = $message;

        return $instance;
    }
}
