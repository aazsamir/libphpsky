<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Post;

/**
 * object
 */
class ReplyRef implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'replyRef';
    public const ID = 'app.bsky.feed.post';

    public ?\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\StrongRef\StrongRef $root = null;
    public ?\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\StrongRef\StrongRef $parent = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        ?\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\StrongRef\StrongRef $root = null,
        ?\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\StrongRef\StrongRef $parent = null,
    ): self {
        $instance = new self();
        $instance->root = $root;
        $instance->parent = $parent;

        return $instance;
    }
}
