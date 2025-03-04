<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetRecord;

/**
 * Get data blocks needed to prove the existence or non-existence of record in the current version of repo. Does not require auth.
 * query
 */
class GetRecord implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.sync.getRecord';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param string $did The DID of the repo.
     * @param string $rkey Record Key
     */
    public function query(string $did, string $collection, string $rkey): mixed
    {
        return $this->request($this->argsWithKeys(func_get_args()));
    }

    /**
     * @param string $did The DID of the repo.
     * @param string $rkey Record Key
     */
    public function rawQuery(string $did, string $collection, string $rkey): mixed
    {
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
