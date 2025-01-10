<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Images;

/**
 * object
 */
class ViewImage implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'viewImage';
    public const ID = 'app.bsky.embed.images';

    public string $thumb;
    public string $fullsize;
    public string $alt;
    public ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Defs\AspectRatio $aspectRatio = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        string $thumb,
        string $fullsize,
        string $alt,
        ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Defs\AspectRatio $aspectRatio = null,
    ): self {
        $instance = new self();
        $instance->thumb = $thumb;
        $instance->fullsize = $fullsize;
        $instance->alt = $alt;
        $instance->aspectRatio = $aspectRatio;

        return $instance;
    }
}
