<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetBlocks;

/**
 * Get data blocks from a given repo, by CID. For example, intermediate MST nodes, or records. Does not require auth; implemented by PDS.
 * query
 */
class GetBlocks implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.sync.getBlocks';

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
     * @param array<string> $cids
     */
    public function query(string $did, array $cids): mixed
    {
        return $this->request($this->argsWithKeys(func_get_args()));
    }

    /**
     * @param string $did The DID of the repo.
     * @param array<string> $cids
     */
    public function rawQuery(string $did, array $cids): mixed
    {
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
