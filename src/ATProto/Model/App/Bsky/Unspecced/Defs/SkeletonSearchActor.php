<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Unspecced\Defs;

/**
 * object
 */
class SkeletonSearchActor implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'skeletonSearchActor';
    public const ID = 'app.bsky.unspecced.defs';

    public string $did;

    public static function id(): string
    {
        return self::ID;
    }
}
