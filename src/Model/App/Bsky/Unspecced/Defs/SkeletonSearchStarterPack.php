<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs;

/**
 * object
 */
class SkeletonSearchStarterPack implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'skeletonSearchStarterPack';
    public const ID = 'app.bsky.unspecced.defs';

    public string $uri;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $uri): self
    {
        $instance = new self();
        $instance->uri = $uri;

        return $instance;
    }
}
