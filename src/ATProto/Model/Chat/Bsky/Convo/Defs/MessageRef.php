<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\Defs;

/**
 * object
 */
class MessageRef implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'messageRef';
    public const ID = 'chat.bsky.convo.defs';

    public string $did;
    public string $convoId;
    public string $messageId;

    public static function id(): string
    {
        return self::ID;
    }
}
