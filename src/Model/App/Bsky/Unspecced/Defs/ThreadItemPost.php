<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs;

/**
 * object
 */
class ThreadItemPost implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'threadItemPost';
    public const ID = 'app.bsky.unspecced.defs';

    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\PostView $post;

    /** @var bool This post has more parents that were not present in the response. This is just a boolean, without the number of parents. */
    public bool $moreParents;

    /** @var int This post has more replies that were not present in the response. This is a numeric value, which is best-effort and might not be accurate. */
    public int $moreReplies;

    /** @var bool This post is part of a contiguous thread by the OP from the thread root. Many different OP threads can happen in the same thread. */
    public bool $opThread;

    /** @var bool The threadgate created by the author indicates this post as a reply to be hidden for everyone consuming the thread. */
    public bool $hiddenByThreadgate;

    /** @var bool This is by an account muted by the viewer requesting it. */
    public bool $mutedByViewer;

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
        return ['post', 'moreParents', 'moreReplies', 'opThread', 'hiddenByThreadgate', 'mutedByViewer'];
    }

    public static function new(
        bool $moreParents,
        int $moreReplies,
        bool $opThread,
        bool $hiddenByThreadgate,
        bool $mutedByViewer,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\PostView $post = null,
    ): self {
        $instance = new self();
        $instance->moreParents = $moreParents;
        $instance->moreReplies = $moreReplies;
        $instance->opThread = $opThread;
        $instance->hiddenByThreadgate = $hiddenByThreadgate;
        $instance->mutedByViewer = $mutedByViewer;
        if ($post !== null) {
            $instance->post = $post;
        }

        return $instance;
    }
}
