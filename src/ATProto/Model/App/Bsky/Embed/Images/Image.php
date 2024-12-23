<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Images;

/**
 * object
 */
class Image implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'image';
    public const ID = 'app.bsky.embed.images';

    public string $image;
    public string $alt;
    public ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Defs\AspectRatio $aspectRatio = null;

    public static function id(): string
    {
        return self::ID;
    }
}
