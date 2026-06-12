<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Embed\Gallery;

/**
 * object
 */
class Image implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'image';
    public const ID = 'app.bsky.embed.gallery';

    public string $image;

    /** @var string Alt text description of the image, for accessibility. */
    public string $alt;
    public \Aazsamir\Libphpsky\Model\App\Bsky\Embed\Defs\AspectRatio $aspectRatio;

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
        return ['image', 'alt', 'aspectRatio'];
    }

    public static function new(
        string $image,
        string $alt,
        \Aazsamir\Libphpsky\Model\App\Bsky\Embed\Defs\AspectRatio $aspectRatio,
    ): self {
        $instance = new self();
        $instance->image = $image;
        $instance->alt = $alt;
        $instance->aspectRatio = $aspectRatio;

        return $instance;
    }
}
