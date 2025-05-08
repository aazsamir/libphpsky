<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\GetHostStatus;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'com.atproto.sync.getHostStatus';

    public string $hostname;

    /** @var ?int Recent repo stream event sequence number. May be delayed from actual stream processing (eg, persisted cursor not in-memory cursor). */
    public ?int $seq;

    /** @var ?int Number of accounts on the server which are associated with the upstream host. Note that the upstream may actually have more accounts. */
    public ?int $accountCount;
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
        return ['hostname'];
    }

    public static function new(
        string $hostname,
        ?int $seq = null,
        ?int $accountCount = null,
        ?string $status = null,
    ): self {
        $instance = new self();
        $instance->hostname = $hostname;
        if ($seq !== null) {
            $instance->seq = $seq;
        }
        if ($accountCount !== null) {
            $instance->accountCount = $accountCount;
        }
        if ($status !== null) {
            $instance->status = $status;
        }

        return $instance;
    }
}
