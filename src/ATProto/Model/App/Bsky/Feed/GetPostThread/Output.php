<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\GetPostThread;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.feed.getPostThread';

    public mixed $thread;
    public ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs\ThreadgateView $threadgate = null;

    public static function id(): string
    {
        return self::ID;
    }
}
