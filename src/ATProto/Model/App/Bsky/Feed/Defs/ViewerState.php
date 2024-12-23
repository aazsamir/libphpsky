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
}
