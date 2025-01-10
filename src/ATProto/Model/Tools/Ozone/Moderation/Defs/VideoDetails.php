<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class VideoDetails implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'videoDetails';
    public const ID = 'tools.ozone.moderation.defs';

    public int $width;
    public int $height;
    public int $length;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(int $width, int $height, int $length): self
    {
        $instance = new self();
        $instance->width = $width;
        $instance->height = $height;
        $instance->length = $length;

        return $instance;
    }
}
