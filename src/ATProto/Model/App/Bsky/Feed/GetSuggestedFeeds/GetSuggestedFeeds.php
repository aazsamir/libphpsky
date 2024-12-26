<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\GetSuggestedFeeds;

/**
 * Get a list of suggested feeds (feed generators) for the requesting account.
 * query
 */
class GetSuggestedFeeds implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.feed.getSuggestedFeeds';

    public static function id(): string
    {
        return self::ID;
    }

    function query(?int $limit = null, ?string $cursor = null): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\GetSuggestedFeeds\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
