<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Embed\Defs;

/**
 * width:height represents an aspect ratio. It may be approximate, and may not correspond to absolute dimensions in any given unit.
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

    public static function name(): string
    {
        return self::NAME;
    }

    public static function nullable(): array
    {
        return [];
    }

    public static function required(): array
    {
        return ['width', 'height'];
    }

    public static function new(int $width, int $height): self
    {
        $instance = new self();
        $instance->width = $width;
        $instance->height = $height;

        return $instance;
    }
}
