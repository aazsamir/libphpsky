<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * Logs account status related events on a repo subject. Normally captured by automod from the firehose and emitted to ozone for historical tracking.
 * object
 */
class AccountEvent implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'accountEvent';
    public const ID = 'tools.ozone.moderation.defs';

    public ?string $comment;

    /** @var bool Indicates that the account has a repository which can be fetched from the host that emitted this event. */
    public bool $active;
    public ?string $status;
    public \DateTimeInterface $timestamp;

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
        return ['timestamp', 'active'];
    }

    public static function new(
        bool $active,
        \DateTimeInterface $timestamp,
        ?string $comment = null,
        ?string $status = null,
    ): self {
        $instance = new self();
        $instance->active = $active;
        $instance->timestamp = $timestamp;
        if ($comment !== null) {
            $instance->comment = $comment;
        }
        if ($status !== null) {
            $instance->status = $status;
        }

        return $instance;
    }
}
