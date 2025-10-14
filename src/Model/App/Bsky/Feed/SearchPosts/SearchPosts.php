<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\SearchPosts;

/**
 * Find posts matching search criteria, returning views of those posts. Note that this API endpoint may require authentication (eg, not public) for some service providers and implementations.
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

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param string $q Search query string; syntax, phrase, boolean, and faceting is unspecified, but Lucene query syntax is recommended.
     * @param ?string $sort Specifies the ranking order of results.
     * @param ?string $since Filter results for posts after the indicated datetime (inclusive). Expected to use 'sortAt' timestamp, which may not match 'createdAt'. Can be a datetime, or just an ISO date (YYYY-MM-DD).
     * @param ?string $until Filter results for posts before the indicated datetime (not inclusive). Expected to use 'sortAt' timestamp, which may not match 'createdAt'. Can be a datetime, or just an ISO date (YYY-MM-DD).
     * @param ?string $mentions Filter to posts which mention the given account. Handles are resolved to DID before query-time. Only matches rich-text facet mentions.
     * @param ?string $author Filter to posts by the given account. Handles are resolved to DID before query-time.
     * @param ?string $lang Filter to posts in the given language. Expected to be based on post language field, though server may override language detection.
     * @param ?string $domain Filter to posts with URLs (facet links or embeds) linking to the given domain (hostname). Server may apply hostname normalization.
     * @param ?string $url Filter to posts with links (facet links or embeds) pointing to this URL. Server may apply URL normalization or fuzzy matching.
     * @param ?array<string> $tag  Filter to posts with the given tag (hashtag), based on rich-text facet or tag field. Do not include the hash (#) prefix. Multiple tags can be specified, with 'AND' matching.
     * @param ?string $cursor Optional pagination mechanism; may not necessarily allow scrolling through entire result set.
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
        return \Aazsamir\Libphpsky\Model\App\Bsky\Feed\SearchPosts\Output::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param string $q Search query string; syntax, phrase, boolean, and faceting is unspecified, but Lucene query syntax is recommended.
     * @param ?string $sort Specifies the ranking order of results.
     * @param ?string $since Filter results for posts after the indicated datetime (inclusive). Expected to use 'sortAt' timestamp, which may not match 'createdAt'. Can be a datetime, or just an ISO date (YYYY-MM-DD).
     * @param ?string $until Filter results for posts before the indicated datetime (not inclusive). Expected to use 'sortAt' timestamp, which may not match 'createdAt'. Can be a datetime, or just an ISO date (YYY-MM-DD).
     * @param ?string $mentions Filter to posts which mention the given account. Handles are resolved to DID before query-time. Only matches rich-text facet mentions.
     * @param ?string $author Filter to posts by the given account. Handles are resolved to DID before query-time.
     * @param ?string $lang Filter to posts in the given language. Expected to be based on post language field, though server may override language detection.
     * @param ?string $domain Filter to posts with URLs (facet links or embeds) linking to the given domain (hostname). Server may apply hostname normalization.
     * @param ?string $url Filter to posts with links (facet links or embeds) pointing to this URL. Server may apply URL normalization or fuzzy matching.
     * @param ?array<string> $tag  Filter to posts with the given tag (hashtag), based on rich-text facet or tag field. Do not include the hash (#) prefix. Multiple tags can be specified, with 'AND' matching.
     * @param ?string $cursor Optional pagination mechanism; may not necessarily allow scrolling through entire result set.
     * @return array<string, mixed>
     */
    public function rawQuery(
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
    ): array {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
