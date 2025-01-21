<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\SearchStarterPacks;

/**
 * Find starter packs matching search criteria. Does not require auth.
 * query
 */
class SearchStarterPacks implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.graph.searchStarterPacks';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param string $q Search query string. Syntax, phrase, boolean, and faceting is unspecified, but Lucene query syntax is recommended.
     */
    public function query(string $q, ?int $limit = null, ?string $cursor = null): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Graph\SearchStarterPacks\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
