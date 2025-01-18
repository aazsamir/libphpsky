<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs;

/**
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
    public ?bool $threadMuted;
    public ?bool $replyDisabled;
    public ?bool $embeddingDisabled;
    public ?bool $pinned;

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
