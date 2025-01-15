<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs;

/**
 * object
 */
class SkeletonReasonRepost implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'skeletonReasonRepost';
    public const ID = 'app.bsky.feed.defs';

    public string $repost;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $repost): self
    {
        $instance = new self();
        $instance->repost = $repost;

        return $instance;
    }
}