<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\ListBlobs;

/**
 * List blob CIDs for an account, since some repo revision. Does not require auth; implemented by PDS.
 * query
 */
class ListBlobs implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.sync.listBlobs';

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
     * @param ?string $since Optional revision of the repo to list blobs since.
     */
    public function query(string $did, ?string $since = null, ?int $limit = null, ?string $cursor = null): Output
    {
        return \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\ListBlobs\Output::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param string $did The DID of the repo.
     * @param ?string $since Optional revision of the repo to list blobs since.
     * @return array<string, mixed>
     */
    public function rawQuery(string $did, ?string $since = null, ?int $limit = null, ?string $cursor = null): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
