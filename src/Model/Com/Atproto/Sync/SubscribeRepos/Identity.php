<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\SubscribeRepos;

/**
 * Represents a change to an account's identity. Could be an updated handle, signing key, or pds hosting endpoint. Serves as a prod to all downstream services to refresh their identity cache.
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

    /** @var ?string The current handle for the account, or 'handle.invalid' if validation fails. This field is optional, might have been validated or passed-through from an upstream source. Semantics and behaviors for PDS vs Relay may evolve in the future; see atproto specs for more details. */
    public ?string $handle;

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

    public static function new(int $seq, string $did, \DateTimeInterface $time, ?string $handle = null): self
    {
        $instance = new self();
        $instance->seq = $seq;
        $instance->did = $did;
        $instance->time = $time;
        if ($handle !== null) {
            $instance->handle = $handle;
        }

        return $instance;
    }
}
