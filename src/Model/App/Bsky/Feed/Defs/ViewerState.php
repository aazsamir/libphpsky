<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs;

/**
 * Metadata about the requesting account's relationship with the subject content. Only has meaningful content for authed requests.
 * object
 */
class ViewerState implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'viewerState';
    public const ID = 'app.bsky.feed.defs';

    public ?string $repost;
    public ?string $like;
    public ?bool $bookmarked;
    public ?bool $threadMuted;
    public ?bool $replyDisabled;
    public ?bool $embeddingDisabled;
    public ?bool $pinned;

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
        return [];
    }

    public static function new(
        ?string $repost = null,
        ?string $like = null,
        ?bool $bookmarked = null,
        ?bool $threadMuted = null,
        ?bool $replyDisabled = null,
        ?bool $embeddingDisabled = null,
        ?bool $pinned = null,
    ): self {
        $instance = new self();
        if ($repost !== null) {
            $instance->repost = $repost;
        }
        if ($like !== null) {
            $instance->like = $like;
        }
        if ($bookmarked !== null) {
            $instance->bookmarked = $bookmarked;
        }
        if ($threadMuted !== null) {
            $instance->threadMuted = $threadMuted;
        }
        if ($replyDisabled !== null) {
            $instance->replyDisabled = $replyDisabled;
        }
        if ($embeddingDisabled !== null) {
            $instance->embeddingDisabled = $embeddingDisabled;
        }
        if ($pinned !== null) {
            $instance->pinned = $pinned;
        }

        return $instance;
    }
}
