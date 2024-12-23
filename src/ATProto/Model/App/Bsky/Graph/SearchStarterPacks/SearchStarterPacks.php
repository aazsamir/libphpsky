<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\SearchStarterPacks;

/**
 * Find starter packs matching search criteria. Does not require auth.
 * query
 */
class SearchStarterPacks implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.graph.searchStarterPacks';

    public static function id(): string
    {
        return self::ID;
    }

    function query(string $q, int $limit, string $cursor): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\SearchStarterPacks\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
