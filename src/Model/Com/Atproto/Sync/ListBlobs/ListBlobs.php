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

    public function query(string $did, ?string $since = null, ?int $limit = null, ?string $cursor = null): Output
    {
        return \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\ListBlobs\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
