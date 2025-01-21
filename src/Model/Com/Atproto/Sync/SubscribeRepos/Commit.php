<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\SubscribeRepos;

/**
 * Represents an update of repository state. Note that empty commits are allowed, which include no repo data changes, but an update to rev and signature.
 * object
 */
class Commit implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'commit';
    public const ID = 'com.atproto.sync.subscribeRepos';

    /** @var int The stream sequence number of this message. */
    public int $seq;

    /** @var bool DEPRECATED -- unused */
    public bool $rebase;

    /** @var bool Indicates that this commit contained too many ops, or data size was too large. Consumers will need to make a separate request to get missing data. */
    public bool $tooBig;

    /** @var string The repo this event comes from. */
    public string $repo;

    /** @var string Repo commit object CID. */
    public string $commit;

    /** @var ?string DEPRECATED -- unused. WARNING -- nullable and optional; stick with optional to ensure golang interoperability. */
    public ?string $prev = null;

    /** @var string The rev of the emitted commit. Note that this information is also in the commit object included in blocks, unless this is a tooBig event. */
    public string $rev;

    /** @var ?string The rev of the last emitted commit from this repo (if any). */
    public ?string $since = null;

    /** @var string CAR file containing relevant blocks, as a diff since the previous repo state. */
    public string $blocks;

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Sync\SubscribeRepos\RepoOp> */
    public array $ops = [];

    /** @var array<string> */
    public array $blobs = [];

    /** @var \DateTimeInterface Timestamp of when this message was originally broadcast. */
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
