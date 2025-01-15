<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\SubscribeRepos;

/**
 * object
 */
class Commit implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

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

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Sync\SubscribeRepos\RepoOp> */
    public array $ops = [];

    /** @var array<string> */
    public array $blobs = [];
    public \DateTimeInterface $time;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Sync\SubscribeRepos\RepoOp> $ops
     * @param array<string> $blobs
     */
    public static function new(
        int $seq,
        bool $rebase,
        bool $tooBig,
        string $repo,
        string $commit,
        string $rev,
        string $since,
        string $blocks,
        array $ops,
        array $blobs,
        \DateTimeInterface $time,
        ?string $prev = null,
    ): self {
        $instance = new self();
        $instance->seq = $seq;
        $instance->rebase = $rebase;
        $instance->tooBig = $tooBig;
        $instance->repo = $repo;
        $instance->commit = $commit;
        $instance->rev = $rev;
        $instance->since = $since;
        $instance->blocks = $blocks;
        $instance->ops = $ops;
        $instance->blobs = $blobs;
        $instance->time = $time;
        $instance->prev = $prev;

        return $instance;
    }
}
