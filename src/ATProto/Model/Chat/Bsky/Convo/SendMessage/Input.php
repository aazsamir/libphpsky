<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\SendMessage;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'chat.bsky.convo.sendMessage';

    public string $convoId;
    public ?\Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\Defs\MessageInput $message = null;

    public static function id(): string
    {
        return self::ID;
    }
}
