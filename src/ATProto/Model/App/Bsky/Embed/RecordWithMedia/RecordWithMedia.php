<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\RecordWithMedia;

/**
 * object
 */
class RecordWithMedia implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'main';
    public const ID = 'app.bsky.embed.recordWithMedia';

    public ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Record\Record $record = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Images\Images|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Video\Video|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\External\External */
    public mixed $media;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Images\Images|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Video\Video|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\External\External $media,
        ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Record\Record $record = null,
    ): self {
        $instance = new self();
        $instance->media = $media;
        $instance->record = $record;

        return $instance;
    }
}
