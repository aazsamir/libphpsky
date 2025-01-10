<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Video;

/**
 * object
 */
class View implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'view';
    public const ID = 'app.bsky.embed.video';

    public string $cid;
    public string $playlist;
    public ?string $thumbnail = null;
    public ?string $alt = null;
    public ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Defs\AspectRatio $aspectRatio = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        string $cid,
        string $playlist,
        ?string $thumbnail = null,
        ?string $alt = null,
        ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Defs\AspectRatio $aspectRatio = null,
    ): self {
        $instance = new self();
        $instance->cid = $cid;
        $instance->playlist = $playlist;
        $instance->thumbnail = $thumbnail;
        $instance->alt = $alt;
        $instance->aspectRatio = $aspectRatio;

        return $instance;
    }
}
