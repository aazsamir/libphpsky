<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\SearchPosts;

/**
 * Find posts matching search criteria, returning views of those posts.
 * query
 */
class SearchPosts implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.feed.searchPosts';

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param string[] $tag
     */
    function query(
        string $q,
        string $sort,
        string $since,
        string $until,
        string $mentions,
        string $author,
        string $lang,
        string $domain,
        string $url,
        array $tag,
        int $limit,
        string $cursor,
    ): Output {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\SearchPosts\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
