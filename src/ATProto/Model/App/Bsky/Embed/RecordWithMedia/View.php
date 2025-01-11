<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\RecordWithMedia;

/**
 * object
 */
class View implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'view';
    public const ID = 'app.bsky.embed.recordWithMedia';

    public ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Record\View $record = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Images\View|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Video\View|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\External\View */
    public mixed $media;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Images\View|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Video\View|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\External\View $media,
        ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Record\View $record = null,
    ): self {
        $instance = new self();
        $instance->media = $media;
        $instance->record = $record;

        return $instance;
    }
}
