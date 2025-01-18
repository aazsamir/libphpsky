<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Embed\Defs;

/**
 * object
 */
class AspectRatio implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'aspectRatio';
    public const ID = 'app.bsky.embed.defs';

    public int $width;
    public int $height;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(int $width, int $height): self
    {
        $instance = new self();
        $instance->width = $width;
        $instance->height = $height;

        return $instance;
    }
}
