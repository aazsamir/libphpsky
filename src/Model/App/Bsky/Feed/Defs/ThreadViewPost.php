<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs;

/**
 * object
 */
class ThreadViewPost implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'threadViewPost';
    public const ID = 'app.bsky.feed.defs';

    public ?PostView $post;

    /** @var \Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\ThreadViewPost|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\NotFoundPost|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\BlockedPost|null */
    public mixed $parent;

    /** @var ?array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\ThreadViewPost|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\NotFoundPost|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\BlockedPost> */
    public ?array $replies = [];
    public ?ThreadContext $threadContext;

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
        return ['post'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\ThreadViewPost|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\NotFoundPost|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\BlockedPost> $replies
     */
    public static function new(
        ?PostView $post = null,
        ThreadViewPost|NotFoundPost|BlockedPost|null $parent = null,
        ?array $replies = [],
        ?ThreadContext $threadContext = null,
    ): self {
        $instance = new self();
        if ($post !== null) {
            $instance->post = $post;
        }
        if ($parent !== null) {
            $instance->parent = $parent;
        }
        if ($replies !== null) {
            $instance->replies = $replies;
        }
        if ($threadContext !== null) {
            $instance->threadContext = $threadContext;
        }

        return $instance;
    }
}
