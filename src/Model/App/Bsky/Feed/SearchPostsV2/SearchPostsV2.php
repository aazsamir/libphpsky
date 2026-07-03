<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\SearchPostsV2;

/**
 * Find posts matching a search query or filters, returning search hits for matching post records.
 * query
 */
class SearchPostsV2 implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.feed.searchPostsV2';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param ?string $cursor Optional pagination cursor.
     * @param ?int $limit Maximum number of results to return.
     * @param ?string $query Search query string. A query or at least one filter is required.
     * @param ?string $sort Ranking order for results. 'recent' sorts by recency; 'top' uses search ranking.
     * @param ?array<string> $authors  Include posts by any of these authors. Handles are resolved to DIDs before searching.
     * @param ?array<string> $mentions  Include posts that mention any of these accounts. Handles are resolved to DIDs before searching.
     * @param ?array<string> $domains  Include posts that link to any of these domains.
     * @param ?array<string> $urls  Include posts that link to any of these URLs.
     * @param ?array<string> $embeddedAtUris  Include posts that embed any of these AT URIs.
     * @param ?array<string> $hashtags  Include posts tagged with any of these hashtags. Do not include the hash (#) prefix.
     * @param ?array<string> $excludeAuthors  Exclude posts by any of these authors. Handles are resolved to DIDs before searching.
     * @param ?array<string> $excludeMentions  Exclude posts that mention any of these accounts. Handles are resolved to DIDs before searching.
     * @param ?array<string> $excludeDomains  Exclude posts that link to any of these domains.
     * @param ?array<string> $excludeUrls  Exclude posts that link to any of these URLs.
     * @param ?array<string> $excludeEmbeddedAtUris  Exclude posts that embed any of these AT URIs.
     * @param ?array<string> $excludeHashtags  Exclude posts tagged with any of these hashtags. Do not include the hash (#) prefix.
     * @param ?string $since Include posts indexed at or after this timestamp. Can be a datetime, or just an ISO date (YYYY-MM-DD).
     * @param ?string $until Include posts indexed before this timestamp. Defaults to the current time. Can be a datetime, or just an ISO date (YYYY-MM-DD).
     * @param ?bool $allTime Search the full index instead of the recent-post window.
     * @param ?array<string> $languages  Include posts whose language matches any of these language codes.
     * @param ?array<string> $excludeLanguages  Exclude posts whose language matches any of these language codes.
     * @param ?bool $hasMedia Include only posts with media.
     * @param ?bool $hasVideo Include only posts with video.
     * @param ?string $replyParentUri Include only direct replies to this parent post URI.
     * @param ?string $threadRootUri Include only posts in the thread rooted at this post URI.
     * @param ?bool $excludeReplies Exclude replies from results. Mutually exclusive with repliesOnly.
     * @param ?bool $repliesOnly Include only replies. Mutually exclusive with excludeReplies.
     * @param ?bool $following Include only posts from accounts followed by the viewer.
     * @param ?string $queryLanguage Language analyzer hint for the query text. If unset, the server auto-detects when possible.
     */
    public function query(
        ?string $cursor = null,
        ?int $limit = null,
        ?string $query = null,
        ?string $sort = null,
        ?array $authors = null,
        ?array $mentions = null,
        ?array $domains = null,
        ?array $urls = null,
        ?array $embeddedAtUris = null,
        ?array $hashtags = null,
        ?array $excludeAuthors = null,
        ?array $excludeMentions = null,
        ?array $excludeDomains = null,
        ?array $excludeUrls = null,
        ?array $excludeEmbeddedAtUris = null,
        ?array $excludeHashtags = null,
        ?string $since = null,
        ?string $until = null,
        ?bool $allTime = null,
        ?array $languages = null,
        ?array $excludeLanguages = null,
        ?bool $hasMedia = null,
        ?bool $hasVideo = null,
        ?string $replyParentUri = null,
        ?string $threadRootUri = null,
        ?bool $excludeReplies = null,
        ?bool $repliesOnly = null,
        ?bool $following = null,
        ?string $queryLanguage = null,
    ): SearchPostsV2Output {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Feed\SearchPostsV2\SearchPostsV2Output::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param ?string $cursor Optional pagination cursor.
     * @param ?int $limit Maximum number of results to return.
     * @param ?string $query Search query string. A query or at least one filter is required.
     * @param ?string $sort Ranking order for results. 'recent' sorts by recency; 'top' uses search ranking.
     * @param ?array<string> $authors  Include posts by any of these authors. Handles are resolved to DIDs before searching.
     * @param ?array<string> $mentions  Include posts that mention any of these accounts. Handles are resolved to DIDs before searching.
     * @param ?array<string> $domains  Include posts that link to any of these domains.
     * @param ?array<string> $urls  Include posts that link to any of these URLs.
     * @param ?array<string> $embeddedAtUris  Include posts that embed any of these AT URIs.
     * @param ?array<string> $hashtags  Include posts tagged with any of these hashtags. Do not include the hash (#) prefix.
     * @param ?array<string> $excludeAuthors  Exclude posts by any of these authors. Handles are resolved to DIDs before searching.
     * @param ?array<string> $excludeMentions  Exclude posts that mention any of these accounts. Handles are resolved to DIDs before searching.
     * @param ?array<string> $excludeDomains  Exclude posts that link to any of these domains.
     * @param ?array<string> $excludeUrls  Exclude posts that link to any of these URLs.
     * @param ?array<string> $excludeEmbeddedAtUris  Exclude posts that embed any of these AT URIs.
     * @param ?array<string> $excludeHashtags  Exclude posts tagged with any of these hashtags. Do not include the hash (#) prefix.
     * @param ?string $since Include posts indexed at or after this timestamp. Can be a datetime, or just an ISO date (YYYY-MM-DD).
     * @param ?string $until Include posts indexed before this timestamp. Defaults to the current time. Can be a datetime, or just an ISO date (YYYY-MM-DD).
     * @param ?bool $allTime Search the full index instead of the recent-post window.
     * @param ?array<string> $languages  Include posts whose language matches any of these language codes.
     * @param ?array<string> $excludeLanguages  Exclude posts whose language matches any of these language codes.
     * @param ?bool $hasMedia Include only posts with media.
     * @param ?bool $hasVideo Include only posts with video.
     * @param ?string $replyParentUri Include only direct replies to this parent post URI.
     * @param ?string $threadRootUri Include only posts in the thread rooted at this post URI.
     * @param ?bool $excludeReplies Exclude replies from results. Mutually exclusive with repliesOnly.
     * @param ?bool $repliesOnly Include only replies. Mutually exclusive with excludeReplies.
     * @param ?bool $following Include only posts from accounts followed by the viewer.
     * @param ?string $queryLanguage Language analyzer hint for the query text. If unset, the server auto-detects when possible.
     * @return array<string, mixed>
     */
    public function rawQuery(
        ?string $cursor = null,
        ?int $limit = null,
        ?string $query = null,
        ?string $sort = null,
        ?array $authors = null,
        ?array $mentions = null,
        ?array $domains = null,
        ?array $urls = null,
        ?array $embeddedAtUris = null,
        ?array $hashtags = null,
        ?array $excludeAuthors = null,
        ?array $excludeMentions = null,
        ?array $excludeDomains = null,
        ?array $excludeUrls = null,
        ?array $excludeEmbeddedAtUris = null,
        ?array $excludeHashtags = null,
        ?string $since = null,
        ?string $until = null,
        ?bool $allTime = null,
        ?array $languages = null,
        ?array $excludeLanguages = null,
        ?bool $hasMedia = null,
        ?bool $hasVideo = null,
        ?string $replyParentUri = null,
        ?string $threadRootUri = null,
        ?bool $excludeReplies = null,
        ?bool $repliesOnly = null,
        ?bool $following = null,
        ?string $queryLanguage = null,
    ): array {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
