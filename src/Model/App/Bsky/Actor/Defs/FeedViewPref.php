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

    /** @var string The URI of the feed, or an identifier which describes the feed. */
    public string $feed;

    /** @var ?bool Hide replies in the feed. */
    public ?bool $hideReplies;

    /** @var ?bool Hide replies in the feed if they are not by followed users. */
    public ?bool $hideRepliesByUnfollowed;

    /** @var ?int Hide replies in the feed if they do not have this number of likes. */
    public ?int $hideRepliesByLikeCount;

    /** @var ?bool Hide reposts in the feed. */
    public ?bool $hideReposts;

    /** @var ?bool Hide quote posts in the feed. */
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
