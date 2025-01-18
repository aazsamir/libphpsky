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
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\ThreadgateView $threadgate;

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public static function nullable(): array
    {
        return [];
    }

    public static function required(): array
    {
        return ['thread'];
    }

    public static function new(
        \Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\ThreadViewPost|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\NotFoundPost|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\BlockedPost $thread,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\ThreadgateView $threadgate = null,
    ): self {
        $instance = new self();
        $instance->thread = $thread;
        if ($threadgate !== null) {
            $instance->threadgate = $threadgate;
        }

        return $instance;
    }
}
