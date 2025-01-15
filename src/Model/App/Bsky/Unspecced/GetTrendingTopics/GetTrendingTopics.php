<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetTrendingTopics;

/**
 * Get a list of trending topics
 * query
 */
class GetTrendingTopics implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.unspecced.getTrendingTopics';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(?string $viewer = null, ?int $limit = null): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetTrendingTopics\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
