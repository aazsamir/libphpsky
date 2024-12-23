<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Unspecced\GetTrendingTopics;

/**
 * Get a list of trending topics
 * query
 */
class GetTrendingTopics implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.unspecced.getTrendingTopics';

    public static function id(): string
    {
        return self::ID;
    }

    function query(string $viewer, int $limit): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Unspecced\GetTrendingTopics\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
