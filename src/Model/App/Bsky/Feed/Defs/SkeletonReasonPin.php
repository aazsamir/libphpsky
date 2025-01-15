<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs;

/**
 * object
 */
class SkeletonReasonPin implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'skeletonReasonPin';
    public const ID = 'app.bsky.feed.defs';

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(): self
    {
        $instance = new self();

        return $instance;
    }
}
