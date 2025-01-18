<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\SubscribeRepos;

/**
 * object
 */
class Commit implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'commit';
    public const ID = 'com.atproto.sync.subscribeRepos';

    public int $seq;
    public bool $rebase;
    public bool $tooBig;
    public string $repo;
    public string $commit;
    public ?string $prev = null;
    public string $rev;
    public ?string $since = null;
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

    public static function name(): string
    {
        return self::NAME;
    }

    public static function nullable(): array
    {
        return ['prev', 'since'];
    }

    public static function required(): array
    {
        return ['seq', 'rebase', 'tooBig', 'repo', 'commit', 'rev', 'since', 'blocks', 'ops', 'blobs', 'time'];
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
        string $blocks,
        array $ops,
        array $blobs,
        \DateTimeInterface $time,
        ?string $prev = null,
        ?string $since = null,
    ): self {
        $instance = new self();
        $instance->seq = $seq;
        $instance->rebase = $rebase;
        $instance->tooBig = $tooBig;
        $instance->repo = $repo;
        $instance->commit = $commit;
        $instance->rev = $rev;
        $instance->blocks = $blocks;
        $instance->ops = $ops;
        $instance->blobs = $blobs;
        $instance->time = $time;
        $instance->prev = $prev;
        $instance->since = $since;

        return $instance;
    }
}
