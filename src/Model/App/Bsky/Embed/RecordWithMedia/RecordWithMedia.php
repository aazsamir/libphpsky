<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Embed\RecordWithMedia;

/**
 * object
 */
class RecordWithMedia implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'main';
    public const ID = 'app.bsky.embed.recordWithMedia';

    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Record\Record $record;

    /** @var \Aazsamir\Libphpsky\Model\App\Bsky\Embed\Images\Images|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Video\Video|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\External\External */
    public mixed $media;

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
        return ['record', 'media'];
    }

    public static function new(
        \Aazsamir\Libphpsky\Model\App\Bsky\Embed\Images\Images|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Video\Video|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\External\External $media,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Record\Record $record = null,
    ): self {
        $instance = new self();
        $instance->media = $media;
        if ($record !== null) {
            $instance->record = $record;
        }

        return $instance;
    }
}
