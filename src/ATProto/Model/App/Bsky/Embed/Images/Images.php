<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Images;

/**
 * object
 */
class Images implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'main';
    public const ID = 'app.bsky.embed.images';

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Images\Image[] */
    public array $images = [];

    public static function id(): string
    {
        return self::ID;
    }
}
