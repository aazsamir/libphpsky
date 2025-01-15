<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\SearchPosts;

/**
 * Find posts matching search criteria, returning views of those posts.
 * query
 */
class SearchPosts implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.feed.searchPosts';

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param ?array<string> $tag
     */
    public function query(
        string $q,
        ?string $sort = null,
        ?string $since = null,
        ?string $until = null,
        ?string $mentions = null,
        ?string $author = null,
        ?string $lang = null,
        ?string $domain = null,
        ?string $url = null,
        ?array $tag = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): Output {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Feed\SearchPosts\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
