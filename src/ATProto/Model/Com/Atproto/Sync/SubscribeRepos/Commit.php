<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Sync\SubscribeRepos;

/**
 * object
 */
class Commit implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'commit';
    public const ID = 'com.atproto.sync.subscribeRepos';

    public int $seq;
    public bool $rebase;
    public bool $tooBig;
    public string $repo;
    public string $commit;
    public ?string $prev = null;
    public string $rev;
    public string $since;
    public string $blocks;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Sync\SubscribeRepos\RepoOp[] */
    public array $ops = [];

    /** @var string[] */
    public array $blobs = [];
    public string $time;

    public static function id(): string
    {
        return self::ID;
    }
}
