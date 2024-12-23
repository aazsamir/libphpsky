<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs;

/**
 * object
 */
class BlockedPost implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'blockedPost';
    public const ID = 'app.bsky.feed.defs';

    public string $uri;
    public bool $blocked;
    public ?BlockedAuthor $author = null;

    public static function id(): string
    {
        return self::ID;
    }
}
