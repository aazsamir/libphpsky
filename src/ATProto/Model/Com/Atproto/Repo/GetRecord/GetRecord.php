<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\GetRecord;

/**
 * Get a single record from a repository. Does not require auth.
 * query
 */
class GetRecord implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.repo.getRecord';

    public static function id(): string
    {
        return self::ID;
    }

    function query(string $repo, string $collection, string $rkey, ?string $cid = null): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Repo\GetRecord\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
