<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\GetRepostedBy;

/**
 * Get a list of reposts for a given post.
 * query
 */
class GetRepostedBy implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.feed.getRepostedBy';

    public static function id(): string
    {
        return self::ID;
    }

    function query(string $uri, ?string $cid = null, ?int $limit = null, ?string $cursor = null): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\GetRepostedBy\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
