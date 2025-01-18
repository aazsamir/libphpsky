<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class FeedViewPref implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'feedViewPref';
    public const ID = 'app.bsky.actor.defs';

    public string $feed;
    public ?bool $hideReplies;
    public ?bool $hideRepliesByUnfollowed;
    public ?int $hideRepliesByLikeCount;
    public ?bool $hideReposts;
    public ?bool $hideQuotePosts;

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
        return ['feed'];
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
        if ($hideReplies !== null) {
            $instance->hideReplies = $hideReplies;
        }
        if ($hideRepliesByUnfollowed !== null) {
            $instance->hideRepliesByUnfollowed = $hideRepliesByUnfollowed;
        }
        if ($hideRepliesByLikeCount !== null) {
            $instance->hideRepliesByLikeCount = $hideRepliesByLikeCount;
        }
        if ($hideReposts !== null) {
            $instance->hideReposts = $hideReposts;
        }
        if ($hideQuotePosts !== null) {
            $instance->hideQuotePosts = $hideQuotePosts;
        }

        return $instance;
    }
}
