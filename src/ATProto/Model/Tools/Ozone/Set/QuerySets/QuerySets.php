<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Set\QuerySets;

/**
 * Query available sets
 * query
 */
class QuerySets implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.set.querySets';

    public static function id(): string
    {
        return self::ID;
    }

    function query(int $limit, string $cursor, string $namePrefix, string $sortBy, string $sortDirection): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Set\QuerySets\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
