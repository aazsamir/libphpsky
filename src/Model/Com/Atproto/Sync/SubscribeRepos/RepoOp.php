<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\SubscribeRepos;

/**
 * object
 */
class RepoOp implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'repoOp';
    public const ID = 'com.atproto.sync.subscribeRepos';

    public string $action;
    public string $path;
    public ?string $cid = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $action, string $path, ?string $cid = null): self
    {
        $instance = new self();
        $instance->action = $action;
        $instance->path = $path;
        $instance->cid = $cid;

        return $instance;
    }
}
