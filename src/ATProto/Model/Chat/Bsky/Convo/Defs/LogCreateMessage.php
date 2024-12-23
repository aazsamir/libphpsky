<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\Defs;

/**
 * object
 */
class LogCreateMessage implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'logCreateMessage';
    public const ID = 'chat.bsky.convo.defs';

    public string $rev;
    public string $convoId;
    public mixed $message;

    public static function id(): string
    {
        return self::ID;
    }
}
