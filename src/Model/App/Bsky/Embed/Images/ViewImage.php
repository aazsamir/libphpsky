<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Embed\Images;

/**
 * object
 */
class ViewImage implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'viewImage';
    public const ID = 'app.bsky.embed.images';

    /** @var string Fully-qualified URL where a thumbnail of the image can be fetched. For example, CDN location provided by the App View. */
    public string $thumb;

    /** @var string Fully-qualified URL where a large version of the image can be fetched. May or may not be the exact original blob. For example, CDN location provided by the App View. */
    public string $fullsize;

    /** @var string Alt text description of the image, for accessibility. */
    public string $alt;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Defs\AspectRatio $aspectRatio;

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
        return ['thumb', 'fullsize', 'alt'];
    }

    public static function new(
        string $thumb,
        string $fullsize,
        string $alt,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Defs\AspectRatio $aspectRatio = null,
    ): self {
        $instance = new self();
        $instance->thumb = $thumb;
        $instance->fullsize = $fullsize;
        $instance->alt = $alt;
        if ($aspectRatio !== null) {
            $instance->aspectRatio = $aspectRatio;
        }

        return $instance;
    }
}
