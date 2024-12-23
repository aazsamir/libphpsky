<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Sync\GetLatestCommit;

/**
 * Get the current commit CID & revision of the specified repo. Does not require auth.
 * query
 */
class GetLatestCommit implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.sync.getLatestCommit';

    public static function id(): string
    {
        return self::ID;
    }

    function query(string $did): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Sync\GetLatestCommit\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
