<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Sync\GetHead;

/**
 * DEPRECATED - please use com.atproto.sync.getLatestCommit instead
 * query
 */
class GetHead implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.sync.getHead';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(string $did): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Sync\GetHead\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
