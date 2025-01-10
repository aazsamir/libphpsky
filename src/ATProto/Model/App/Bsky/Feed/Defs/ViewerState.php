<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs;

/**
 * object
 */
class ViewerState implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'viewerState';
    public const ID = 'app.bsky.feed.defs';

    public ?string $repost = null;
    public ?string $like = null;
    public ?bool $threadMuted = null;
    public ?bool $replyDisabled = null;
    public ?bool $embeddingDisabled = null;
    public ?bool $pinned = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        ?string $repost = null,
        ?string $like = null,
        ?bool $threadMuted = null,
        ?bool $replyDisabled = null,
        ?bool $embeddingDisabled = null,
        ?bool $pinned = null,
    ): self {
        $instance = new self();
        $instance->repost = $repost;
        $instance->like = $like;
        $instance->threadMuted = $threadMuted;
        $instance->replyDisabled = $replyDisabled;
        $instance->embeddingDisabled = $embeddingDisabled;
        $instance->pinned = $pinned;

        return $instance;
    }
}
