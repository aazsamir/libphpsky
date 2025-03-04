<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\SearchStarterPacksSkeleton;

/**
 * Backend Starter Pack search, returns only skeleton.
 * query
 */
class SearchStarterPacksSkeleton implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.unspecced.searchStarterPacksSkeleton';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param string $q Search query string; syntax, phrase, boolean, and faceting is unspecified, but Lucene query syntax is recommended.
     * @param ?string $viewer DID of the account making the request (not included for public/unauthenticated queries).
     * @param ?string $cursor Optional pagination mechanism; may not necessarily allow scrolling through entire result set.
     */
    public function query(string $q, ?string $viewer = null, ?int $limit = null, ?string $cursor = null): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\SearchStarterPacksSkeleton\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @param string $q Search query string; syntax, phrase, boolean, and faceting is unspecified, but Lucene query syntax is recommended.
     * @param ?string $viewer DID of the account making the request (not included for public/unauthenticated queries).
     * @param ?string $cursor Optional pagination mechanism; may not necessarily allow scrolling through entire result set.
     * @return array<string, mixed>
     */
    public function rawQuery(string $q, ?string $viewer = null, ?int $limit = null, ?string $cursor = null): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
