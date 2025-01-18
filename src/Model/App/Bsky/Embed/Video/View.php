<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Embed\Video;

/**
 * object
 */
class View implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'view';
    public const ID = 'app.bsky.embed.video';

    public string $cid;
    public string $playlist;
    public ?string $thumbnail;
    public ?string $alt;
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
        return ['cid', 'playlist'];
    }

    public static function new(
        string $cid,
        string $playlist,
        ?string $thumbnail = null,
        ?string $alt = null,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Defs\AspectRatio $aspectRatio = null,
    ): self {
        $instance = new self();
        $instance->cid = $cid;
        $instance->playlist = $playlist;
        if ($thumbnail !== null) {
            $instance->thumbnail = $thumbnail;
        }
        if ($alt !== null) {
            $instance->alt = $alt;
        }
        if ($aspectRatio !== null) {
            $instance->aspectRatio = $aspectRatio;
        }

        return $instance;
    }
}
