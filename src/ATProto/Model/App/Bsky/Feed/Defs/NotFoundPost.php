<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs;

/**
 * object
 */
class NotFoundPost implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'notFoundPost';
    public const ID = 'app.bsky.feed.defs';

    public string $uri;
    public bool $notFound;

    public static function id(): string
    {
        return self::ID;
    }
}
