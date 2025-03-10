<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs;

/**
 * object
 */
class ReplyRef implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'replyRef';
    public const ID = 'app.bsky.feed.defs';

    /** @var \Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\PostView|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\NotFoundPost|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\BlockedPost */
    public mixed $root;

    /** @var \Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\PostView|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\NotFoundPost|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\BlockedPost */
    public mixed $parent;

    /** @var ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileViewBasic When parent is a reply to another post, this is the author of that post. */
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileViewBasic $grandparentAuthor;

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
        return ['root', 'parent'];
    }

    public static function new(
        PostView|NotFoundPost|BlockedPost $root,
        PostView|NotFoundPost|BlockedPost $parent,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileViewBasic $grandparentAuthor = null,
    ): self {
        $instance = new self();
        $instance->root = $root;
        $instance->parent = $parent;
        if ($grandparentAuthor !== null) {
            $instance->grandparentAuthor = $grandparentAuthor;
        }

        return $instance;
    }
}
