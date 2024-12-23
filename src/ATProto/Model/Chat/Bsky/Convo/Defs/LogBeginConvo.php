<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\Defs;

/**
 * object
 */
class LogBeginConvo implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'logBeginConvo';
    public const ID = 'chat.bsky.convo.defs';

    public string $rev;
    public string $convoId;

    public static function id(): string
    {
        return self::ID;
    }
}
