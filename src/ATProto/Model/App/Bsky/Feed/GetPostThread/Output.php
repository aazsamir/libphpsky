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

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs\ThreadViewPost|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs\NotFoundPost|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs\BlockedPost */
    public mixed $thread;
    public ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs\ThreadgateView $threadgate = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        mixed $thread,
        ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs\ThreadgateView $threadgate = null,
    ): self {
        $instance = new self();
        $instance->thread = $thread;
        $instance->threadgate = $threadgate;

        return $instance;
    }
}
