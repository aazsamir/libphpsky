<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Unspecced\GetTrendingTopics;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.unspecced.getTrendingTopics';

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Unspecced\Defs\TrendingTopic[] */
    public array $topics = [];

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Unspecced\Defs\TrendingTopic[] */
    public array $suggested = [];

    public static function id(): string
    {
        return self::ID;
    }
}
