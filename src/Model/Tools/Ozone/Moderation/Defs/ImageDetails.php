<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class ImageDetails implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'imageDetails';
    public const ID = 'tools.ozone.moderation.defs';

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
