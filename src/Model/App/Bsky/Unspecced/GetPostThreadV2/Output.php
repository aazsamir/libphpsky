<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetPostThreadV2;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.unspecced.getPostThreadV2';

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetPostThreadV2\ThreadItem> A flat list of thread items. The depth of each item is indicated by the depth property inside the item. */
    public array $thread = [];
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\ThreadgateView $threadgate;

    /** @var bool Whether this thread has additional replies. If true, a call can be made to the `getPostThreadOtherV2` endpoint to retrieve them. */
    public bool $hasOtherReplies;

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
        return ['thread', 'hasOtherReplies'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetPostThreadV2\ThreadItem> $thread
     */
    public static function new(
        array $thread,
        bool $hasOtherReplies,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\ThreadgateView $threadgate = null,
    ): self {
        $instance = new self();
        $instance->thread = $thread;
        $instance->hasOtherReplies = $hasOtherReplies;
        if ($threadgate !== null) {
            $instance->threadgate = $threadgate;
        }

        return $instance;
    }
}
