<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetPostThread;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.feed.getPostThread';

    /** @var \Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\ThreadViewPost|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\NotFoundPost|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\BlockedPost */
    public mixed $thread;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\ThreadgateView $threadgate = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        \Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\ThreadViewPost|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\NotFoundPost|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\BlockedPost $thread,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\ThreadgateView $threadgate = null,
    ): self {
        $instance = new self();
        $instance->thread = $thread;
        $instance->threadgate = $threadgate;

        return $instance;
    }
}
