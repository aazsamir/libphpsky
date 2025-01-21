<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\SubscribeRepos;

/**
 * Represents a change to an account's status on a host (eg, PDS or Relay). The semantics of this event are that the status is at the host which emitted the event, not necessarily that at the currently active PDS. Eg, a Relay takedown would emit a takedown with active=false, even if the PDS is still active.
 * object
 */
class Account implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'account';
    public const ID = 'com.atproto.sync.subscribeRepos';

    public int $seq;
    public string $did;
    public \DateTimeInterface $time;

    /** @var bool Indicates that the account has a repository which can be fetched from the host that emitted this event. */
    public bool $active;

    /** @var ?string If active=false, this optional field indicates a reason for why the account is not active. */
    public ?string $status;

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
        return ['seq', 'did', 'time', 'active'];
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
        if ($status !== null) {
            $instance->status = $status;
        }

        return $instance;
    }
}
