<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Unspecced\Defs;

/**
 * object
 */
class SkeletonSearchPost implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'skeletonSearchPost';
    public const ID = 'app.bsky.unspecced.defs';

    public string $uri;

    public static function id(): string
    {
        return self::ID;
    }
}
