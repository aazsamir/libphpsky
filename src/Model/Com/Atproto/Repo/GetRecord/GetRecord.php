<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Repo\GetRecord;

/**
 * Get a single record from a repository. Does not require auth.
 * query
 */
class GetRecord implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.repo.getRecord';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param string $repo The handle or DID of the repo.
     * @param string $collection The NSID of the record collection.
     * @param string $rkey The Record Key.
     * @param ?string $cid The CID of the version of the record. If not specified, then return the most recent version.
     */
    public function query(string $repo, string $collection, string $rkey, ?string $cid = null): Output
    {
        return \Aazsamir\Libphpsky\Model\Com\Atproto\Repo\GetRecord\Output::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param string $repo The handle or DID of the repo.
     * @param string $collection The NSID of the record collection.
     * @param string $rkey The Record Key.
     * @param ?string $cid The CID of the version of the record. If not specified, then return the most recent version.
     * @return array<string, mixed>
     */
    public function rawQuery(string $repo, string $collection, string $rkey, ?string $cid = null): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
