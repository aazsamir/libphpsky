<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Unspecced\SearchPostsSkeleton;

/**
 * Backend Posts search, returns only skeleton
 * query
 */
class SearchPostsSkeleton implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.unspecced.searchPostsSkeleton';

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
        string $viewer,
        int $limit,
        string $cursor,
    ): Output {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Unspecced\SearchPostsSkeleton\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
