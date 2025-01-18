<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\SubscribeRepos;

/**
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
    public string $migrateTo;
    public \DateTimeInterface $time;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(int $seq, string $did, string $migrateTo, \DateTimeInterface $time): self
    {
        $instance = new self();
        $instance->seq = $seq;
        $instance->did = $did;
        $instance->migrateTo = $migrateTo;
        $instance->time = $time;

        return $instance;
    }
}
