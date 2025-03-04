<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetBlob;

/**
 * Get a blob associated with a given account. Returns the full blob as originally uploaded. Does not require auth; implemented by PDS.
 * query
 */
class GetBlob implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.sync.getBlob';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param string $did The DID of the account.
     * @param string $cid The CID of the blob to fetch
     */
    public function query(string $did, string $cid): mixed
    {
        return $this->request($this->argsWithKeys(func_get_args()));
    }

    /**
     * @param string $did The DID of the account.
     * @param string $cid The CID of the blob to fetch
     */
    public function rawQuery(string $did, string $cid): mixed
    {
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
