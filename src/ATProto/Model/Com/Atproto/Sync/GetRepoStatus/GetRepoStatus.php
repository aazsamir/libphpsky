<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Sync\GetRepoStatus;

/**
 * Get the hosting status for a repository, on this server. Expected to be implemented by PDS and Relay.
 * query
 */
class GetRepoStatus implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.sync.getRepoStatus';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(string $did): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Sync\GetRepoStatus\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
