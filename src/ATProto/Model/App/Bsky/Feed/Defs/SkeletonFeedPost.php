<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs;

/**
 * object
 */
class SkeletonFeedPost implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'skeletonFeedPost';
    public const ID = 'app.bsky.feed.defs';

    public string $post;
    public mixed $reason = null;
    public ?string $feedContext = null;

    public static function id(): string
    {
        return self::ID;
    }
}
