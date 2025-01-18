<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\SubscribeRepos;

/**
 * object
 */
class Identity implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'identity';
    public const ID = 'com.atproto.sync.subscribeRepos';

    public int $seq;
    public string $did;
    public \DateTimeInterface $time;
    public ?string $handle = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(int $seq, string $did, \DateTimeInterface $time, ?string $handle = null): self
    {
        $instance = new self();
        $instance->seq = $seq;
        $instance->did = $did;
        $instance->time = $time;
        $instance->handle = $handle;

        return $instance;
    }
}
