<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\SubscribeRepos;

/**
 * object
 */
class Identity implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'identity';
    public const ID = 'com.atproto.sync.subscribeRepos';

    public int $seq;
    public string $did;
    public string $time;
    public ?string $handle = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(int $seq, string $did, string $time, ?string $handle = null): self
    {
        $instance = new self();
        $instance->seq = $seq;
        $instance->did = $did;
        $instance->time = $time;
        $instance->handle = $handle;

        return $instance;
    }
}
