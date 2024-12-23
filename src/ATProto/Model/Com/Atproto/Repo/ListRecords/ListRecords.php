<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\ListRecords;

/**
 * List a range of records in a repository, matching a specific collection. Does not require auth.
 * query
 */
class ListRecords implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.repo.listRecords';

    public static function id(): string
    {
        return self::ID;
    }

    function query(
        string $repo,
        string $collection,
        int $limit,
        string $cursor,
        string $rkeyStart,
        string $rkeyEnd,
        bool $reverse,
    ): Output {
        return \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\ListRecords\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
