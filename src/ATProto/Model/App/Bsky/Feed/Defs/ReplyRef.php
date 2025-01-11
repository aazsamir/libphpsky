<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs;

/**
 * object
 */
class ReplyRef implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'replyRef';
    public const ID = 'app.bsky.feed.defs';

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs\PostView|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs\NotFoundPost|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs\BlockedPost */
    public mixed $root;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs\PostView|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs\NotFoundPost|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs\BlockedPost */
    public mixed $parent;
    public ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ProfileViewBasic $grandparentAuthor = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        PostView|NotFoundPost|BlockedPost $root,
        PostView|NotFoundPost|BlockedPost $parent,
        ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ProfileViewBasic $grandparentAuthor = null,
    ): self {
        $instance = new self();
        $instance->root = $root;
        $instance->parent = $parent;
        $instance->grandparentAuthor = $grandparentAuthor;

        return $instance;
    }
}
