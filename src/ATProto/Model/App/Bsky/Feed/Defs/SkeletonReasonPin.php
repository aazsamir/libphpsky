<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs;

/**
 * object
 */
class SkeletonReasonPin implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'skeletonReasonPin';
    public const ID = 'app.bsky.feed.defs';

    public static function id(): string
    {
        return self::ID;
    }
}
