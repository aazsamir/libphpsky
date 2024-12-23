<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Unspecced\Defs;

/**
 * object
 */
class TrendingTopic implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'trendingTopic';
    public const ID = 'app.bsky.unspecced.defs';

    public string $topic;
    public ?string $displayName = null;
    public ?string $description = null;
    public string $link;

    public static function id(): string
    {
        return self::ID;
    }
}
