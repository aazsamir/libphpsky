<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Defs;

/**
 * object
 */
class AspectRatio implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'aspectRatio';
    public const ID = 'app.bsky.embed.defs';

    public int $width;
    public int $height;

    public static function id(): string
    {
        return self::ID;
    }
}
