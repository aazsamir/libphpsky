<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Embed\Images;

/**
 * object
 */
class View implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'view';
    public const ID = 'app.bsky.embed.images';

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Images\ViewImage> */
    public array $images = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Images\ViewImage> $images
     */
    public static function new(array $images): self
    {
        $instance = new self();
        $instance->images = $images;

        return $instance;
    }
}
