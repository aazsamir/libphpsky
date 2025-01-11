<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\GetFeedGenerators;

/**
 * Get information about a list of feed generators.
 * query
 */
class GetFeedGenerators implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.feed.getFeedGenerators';

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<string> $feeds
     */
    public function query(array $feeds): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\GetFeedGenerators\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
