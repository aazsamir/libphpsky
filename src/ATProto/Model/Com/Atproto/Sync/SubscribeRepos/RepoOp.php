<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Sync\SubscribeRepos;

/**
 * object
 */
class RepoOp implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'repoOp';
    public const ID = 'com.atproto.sync.subscribeRepos';

    public string $action;
    public string $path;
    public string $cid;

    public static function id(): string
    {
        return self::ID;
    }
}
