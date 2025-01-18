<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetTrendingTopics;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.unspecced.getTrendingTopics';

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs\TrendingTopic> */
    public array $topics = [];

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs\TrendingTopic> */
    public array $suggested = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs\TrendingTopic> $topics
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs\TrendingTopic> $suggested
     */
    public static function new(array $topics, array $suggested): self
    {
        $instance = new self();
        $instance->topics = $topics;
        $instance->suggested = $suggested;

        return $instance;
    }
}
