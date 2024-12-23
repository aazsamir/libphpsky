<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\Starterpack;

/**
 * object
 */
class FeedItem implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'feedItem';
    public const ID = 'app.bsky.graph.starterpack';

    public string $uri;

    public static function id(): string
    {
        return self::ID;
    }
}
