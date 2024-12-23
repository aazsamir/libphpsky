<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Sync\GetRepo;

/**
 * Download a repository export as CAR file. Optionally only a 'diff' since a previous revision. Does not require auth; implemented by PDS.
 * query
 */
class GetRepo implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.sync.getRepo';

    public static function id(): string
    {
        return self::ID;
    }

    function query(string $did, string $since): mixed
    {
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
