<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\SubscribeRepos;

/**
 * Updates the repo to a new state, without necessarily including that state on the firehose. Used to recover from broken commit streams, data loss incidents, or in situations where upstream host does not know recent state of the repository.
 * object
 */
class Sync implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'sync';
    public const ID = 'com.atproto.sync.subscribeRepos';

    /** @var int The stream sequence number of this message. */
    public int $seq;

    /** @var string The account this repo event corresponds to. Must match that in the commit object. */
    public string $did;

    /** @var string CAR file containing the commit, as a block. The CAR header must include the commit block CID as the first 'root'. */
    public string $blocks;

    /** @var string The rev of the commit. This value must match that in the commit object. */
    public string $rev;

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
        return [];
    }

    public static function required(): array
    {
        return ['seq', 'did', 'blocks', 'rev', 'time'];
    }

    public static function new(int $seq, string $did, string $blocks, string $rev, \DateTimeInterface $time): self
    {
        $instance = new self();
        $instance->seq = $seq;
        $instance->did = $did;
        $instance->blocks = $blocks;
        $instance->rev = $rev;
        $instance->time = $time;

        return $instance;
    }
}
