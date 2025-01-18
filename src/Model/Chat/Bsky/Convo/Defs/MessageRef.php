<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs;

/**
 * object
 */
class MessageRef implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'messageRef';
    public const ID = 'chat.bsky.convo.defs';

    public string $did;
    public string $convoId;
    public string $messageId;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $did, string $convoId, string $messageId): self
    {
        $instance = new self();
        $instance->did = $did;
        $instance->convoId = $convoId;
        $instance->messageId = $messageId;

        return $instance;
    }
}
