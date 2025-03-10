<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetLatestCommit;

/**
 * Get the current commit CID & revision of the specified repo. Does not require auth.
 * query
 */
class GetLatestCommit implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.sync.getLatestCommit';

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
     */
    public function query(string $did): Output
    {
        return \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetLatestCommit\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @param string $did The DID of the repo.
     * @return array<string, mixed>
     */
    public function rawQuery(string $did): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
