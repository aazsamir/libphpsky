<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Record;

/**
 * object
 */
class ViewNotFound implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'viewNotFound';
    public const ID = 'app.bsky.embed.record';

    public string $uri;
    public bool $notFound;

    public static function id(): string
    {
        return self::ID;
    }
}
