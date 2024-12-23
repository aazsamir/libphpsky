<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class ImageDetails implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'imageDetails';
    public const ID = 'tools.ozone.moderation.defs';

    public int $width;
    public int $height;

    public static function id(): string
    {
        return self::ID;
    }
}
