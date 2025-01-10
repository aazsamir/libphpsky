<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Images;

/**
 * object
 */
class View implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'view';
    public const ID = 'app.bsky.embed.images';

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Images\ViewImage[] */
    public array $images = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Images\ViewImage[] $images
     */
    public static function new(array $images): self
    {
        $instance = new self();
        $instance->images = $images;

        return $instance;
    }
}
