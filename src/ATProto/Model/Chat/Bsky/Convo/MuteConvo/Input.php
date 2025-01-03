<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\MuteConvo;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'chat.bsky.convo.muteConvo';

    public string $convoId;

    public static function id(): string
    {
        return self::ID;
    }
}
