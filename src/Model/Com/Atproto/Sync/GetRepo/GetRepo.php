<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetRepo;

/**
 * Download a repository export as CAR file. Optionally only a 'diff' since a previous revision. Does not require auth; implemented by PDS.
 * query
 */
class GetRepo implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.sync.getRepo';

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
     * @param ?string $since The revision ('rev') of the repo to create a diff from.
     */
    public function query(string $did, ?string $since = null): mixed
    {
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
