<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs;

/**
 * object
 */
class ThreadViewPost implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'threadViewPost';
    public const ID = 'app.bsky.feed.defs';

    public ?PostView $post = null;

    /** @var \Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\ThreadViewPost|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\NotFoundPost|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\BlockedPost|null */
    public mixed $parent = null;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\ThreadViewPost|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\NotFoundPost|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\BlockedPost>|null */
    public ?array $replies = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\ThreadViewPost|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\NotFoundPost|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\BlockedPost> $replies
     */
    public static function new(
        ?PostView $post = null,
        ThreadViewPost|NotFoundPost|BlockedPost|null $parent = null,
        ?array $replies = null,
    ): self {
        $instance = new self();
        $instance->post = $post;
        $instance->parent = $parent;
        $instance->replies = $replies;

        return $instance;
    }
}
