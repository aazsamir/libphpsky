<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\SendMessageBatch;

/**
 * object
 */
class BatchItem implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'batchItem';
    public const ID = 'chat.bsky.convo.sendMessageBatch';

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
