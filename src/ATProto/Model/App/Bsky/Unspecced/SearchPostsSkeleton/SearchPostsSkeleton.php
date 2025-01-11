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
     * @param ?array<string> $tag
     */
    function query(
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
        ?string $viewer = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): Output {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Unspecced\SearchPostsSkeleton\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
