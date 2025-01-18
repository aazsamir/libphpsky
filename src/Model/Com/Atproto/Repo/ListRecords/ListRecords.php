<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ListRecords;

/**
 * List a range of records in a repository, matching a specific collection. Does not require auth.
 * query
 */
class ListRecords implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.repo.listRecords';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function query(
        string $repo,
        string $collection,
        ?int $limit = null,
        ?string $cursor = null,
        ?string $rkeyStart = null,
        ?string $rkeyEnd = null,
        ?bool $reverse = null,
    ): Output {
        return \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\ListRecords\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
