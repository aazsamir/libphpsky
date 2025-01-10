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
    public mixed $media;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        mixed $media,
        ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Record\Record $record = null,
    ): self {
        $instance = new self();
        $instance->media = $media;
        $instance->record = $record;

        return $instance;
    }
}
