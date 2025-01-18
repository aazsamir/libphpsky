<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Embed\Video;

/**
 * object
 */
class Video implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'main';
    public const ID = 'app.bsky.embed.video';

    public string $video;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Video\Caption>|null */
    public ?array $captions = [];
    public ?string $alt = null;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Defs\AspectRatio $aspectRatio = null;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Video\Caption> $captions
     */
    public static function new(
        string $video,
        ?array $captions = null,
        ?string $alt = null,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Defs\AspectRatio $aspectRatio = null,
    ): self {
        $instance = new self();
        $instance->video = $video;
        $instance->captions = $captions;
        $instance->alt = $alt;
        $instance->aspectRatio = $aspectRatio;

        return $instance;
    }
}
