<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\ListMissingBlobs;

/**
 * Returns a list of missing blobs for the requesting account. Intended to be used in the account migration flow.
 * query
 */
class ListMissingBlobs implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.repo.listMissingBlobs';

    public static function id(): string
    {
        return self::ID;
    }

    function query(int $limit, string $cursor): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\ListMissingBlobs\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
