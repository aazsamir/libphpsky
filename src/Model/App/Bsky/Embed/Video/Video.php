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

    /** @var string The mp4 video file. May be up to 100mb, formerly limited to 50mb. */
    public string $video;

    /** @var ?array<\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Video\Caption> */
    public ?array $captions = [];

    /** @var ?string Alt text description of the video, for accessibility. */
    public ?string $alt;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Defs\AspectRatio $aspectRatio;

    /** @var ?string A hint to the client about how to present the video. */
    public ?string $presentation;

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
        return ['video'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Video\Caption> $captions
     */
    public static function new(
        string $video,
        ?array $captions = [],
        ?string $alt = null,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Defs\AspectRatio $aspectRatio = null,
        ?string $presentation = null,
    ): self {
        $instance = new self();
        $instance->video = $video;
        if ($captions !== null) {
            $instance->captions = $captions;
        }
        if ($alt !== null) {
            $instance->alt = $alt;
        }
        if ($aspectRatio !== null) {
            $instance->aspectRatio = $aspectRatio;
        }
        if ($presentation !== null) {
            $instance->presentation = $presentation;
        }

        return $instance;
    }
}
