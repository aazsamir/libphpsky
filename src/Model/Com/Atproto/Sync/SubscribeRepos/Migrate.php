<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\SubscribeRepos;

/**
 * DEPRECATED -- Use #account event instead
 * object
 */
class Migrate implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'migrate';
    public const ID = 'com.atproto.sync.subscribeRepos';

    public int $seq;
    public string $did;
    public ?string $migrateTo = null;
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
        return ['migrateTo'];
    }

    public static function required(): array
    {
        return ['seq', 'did', 'migrateTo', 'time'];
    }

    public static function new(int $seq, string $did, \DateTimeInterface $time, ?string $migrateTo = null): self
    {
        $instance = new self();
        $instance->seq = $seq;
        $instance->did = $did;
        $instance->time = $time;
        $instance->migrateTo = $migrateTo;

        return $instance;
    }
}
