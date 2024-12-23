<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\DescribeFeedGenerator;

/**
 * object
 */
class Feed implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'feed';
    public const ID = 'app.bsky.feed.describeFeedGenerator';

    public string $uri;

    public static function id(): string
    {
        return self::ID;
    }
}
