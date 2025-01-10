<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs;

/**
 * object
 */
class ThreadViewPost implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'threadViewPost';
    public const ID = 'app.bsky.feed.defs';

    public ?PostView $post = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs\ThreadViewPost|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs\NotFoundPost|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs\BlockedPost */
    public mixed $parent = null;

    /** @var mixed[] */
    public ?array $replies = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param mixed[] $replies
     */
    public static function new(?PostView $post = null, mixed $parent = null, ?array $replies = null): self
    {
        $instance = new self();
        $instance->post = $post;
        $instance->parent = $parent;
        $instance->replies = $replies;

        return $instance;
    }
}
