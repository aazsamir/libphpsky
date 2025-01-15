<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class FeedViewPref implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'feedViewPref';
    public const ID = 'app.bsky.actor.defs';

    public string $feed;
    public ?bool $hideReplies = null;
    public ?bool $hideRepliesByUnfollowed = null;
    public ?int $hideRepliesByLikeCount = null;
    public ?bool $hideReposts = null;
    public ?bool $hideQuotePosts = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        string $feed,
        ?bool $hideReplies = null,
        ?bool $hideRepliesByUnfollowed = null,
        ?int $hideRepliesByLikeCount = null,
        ?bool $hideReposts = null,
        ?bool $hideQuotePosts = null,
    ): self {
        $instance = new self();
        $instance->feed = $feed;
        $instance->hideReplies = $hideReplies;
        $instance->hideRepliesByUnfollowed = $hideRepliesByUnfollowed;
        $instance->hideRepliesByLikeCount = $hideRepliesByLikeCount;
        $instance->hideReposts = $hideReposts;
        $instance->hideQuotePosts = $hideQuotePosts;

        return $instance;
    }
}
