<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\SubscribeRepos;

/**
 * object
 */
class Account implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'account';
    public const ID = 'com.atproto.sync.subscribeRepos';

    public int $seq;
    public string $did;
    public \DateTimeInterface $time;
    public bool $active;
    public ?string $status = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        int $seq,
        string $did,
        \DateTimeInterface $time,
        bool $active,
        ?string $status = null,
    ): self {
        $instance = new self();
        $instance->seq = $seq;
        $instance->did = $did;
        $instance->time = $time;
        $instance->active = $active;
        $instance->status = $status;

        return $instance;
    }
}
