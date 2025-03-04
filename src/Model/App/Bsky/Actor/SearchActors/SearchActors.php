<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\SearchActors;

/**
 * Find actors (profiles) matching search criteria. Does not require auth.
 * query
 */
class SearchActors implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.actor.searchActors';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param ?string $term DEPRECATED: use 'q' instead.
     * @param ?string $q Search query string. Syntax, phrase, boolean, and faceting is unspecified, but Lucene query syntax is recommended.
     */
    public function query(?string $term = null, ?string $q = null, ?int $limit = null, ?string $cursor = null): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Actor\SearchActors\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @param ?string $term DEPRECATED: use 'q' instead.
     * @param ?string $q Search query string. Syntax, phrase, boolean, and faceting is unspecified, but Lucene query syntax is recommended.
     * @return array<string, mixed>
     */
    public function rawQuery(
        ?string $term = null,
        ?string $q = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): array {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
