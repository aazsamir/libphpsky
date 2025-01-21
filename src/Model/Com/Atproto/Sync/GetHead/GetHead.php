<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetHead;

/**
 * DEPRECATED - please use com.atproto.sync.getLatestCommit instead
 * query
 */
class GetHead implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.sync.getHead';

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
        return \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetHead\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
