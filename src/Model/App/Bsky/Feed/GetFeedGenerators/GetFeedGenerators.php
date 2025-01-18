<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetFeedGenerators;

/**
 * Get information about a list of feed generators.
 * query
 */
class GetFeedGenerators implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.feed.getFeedGenerators';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param array<string> $feeds
     */
    public function query(array $feeds): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetFeedGenerators\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
