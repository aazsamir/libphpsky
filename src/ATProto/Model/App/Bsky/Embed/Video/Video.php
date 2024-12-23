<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Video;

/**
 * object
 */
class Video implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'main';
    public const ID = 'app.bsky.embed.video';

    public string $video;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Video\Caption[] */
    public ?array $captions = [];
    public ?string $alt = null;
    public ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Defs\AspectRatio $aspectRatio = null;

    public static function id(): string
    {
        return self::ID;
    }
}
