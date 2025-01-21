<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\SubscribeRepos;

/**
 * DEPRECATED -- Use #account event instead
 * object
 */
class Tombstone implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'tombstone';
    public const ID = 'com.atproto.sync.subscribeRepos';

    public int $seq;
    public string $did;
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
        return ['seq', 'did', 'time'];
    }

    public static function new(int $seq, string $did, \DateTimeInterface $time): self
    {
        $instance = new self();
        $instance->seq = $seq;
        $instance->did = $did;
        $instance->time = $time;

        return $instance;
    }
}
