<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Threadgate;

/**
 * object
 */
class MentionRule implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'mentionRule';
    public const ID = 'app.bsky.feed.threadgate';

    public static function id(): string
    {
        return self::ID;
    }
}
