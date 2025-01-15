<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs;

/**
 * object
 */
class SkeletonSearchActor implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'skeletonSearchActor';
    public const ID = 'app.bsky.unspecced.defs';

    public string $did;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $did): self
    {
        $instance = new self();
        $instance->did = $did;

        return $instance;
    }
}
