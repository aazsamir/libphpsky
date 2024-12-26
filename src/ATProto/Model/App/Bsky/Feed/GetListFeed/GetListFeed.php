<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\GetListFeed;

/**
 * Get a feed of recent posts from a list (posts and reposts from any actors on the list). Does not require auth.
 * query
 */
class GetListFeed implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.feed.getListFeed';

    public static function id(): string
    {
        return self::ID;
    }

    function query(string $list, ?int $limit = null, ?string $cursor = null): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\GetListFeed\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
