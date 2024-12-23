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
    public mixed $media;

    public static function id(): string
    {
        return self::ID;
    }
}
