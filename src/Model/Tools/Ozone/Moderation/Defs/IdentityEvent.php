<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * Logs identity related events on a repo subject. Normally captured by automod from the firehose and emitted to ozone for historical tracking.
 * object
 */
class IdentityEvent implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'identityEvent';
    public const ID = 'tools.ozone.moderation.defs';

    public ?string $comment;
    public ?string $handle;
    public ?string $pdsHost;
    public ?bool $tombstone;
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
        return ['timestamp'];
    }

    public static function new(
        \DateTimeInterface $timestamp,
        ?string $comment = null,
        ?string $handle = null,
        ?string $pdsHost = null,
        ?bool $tombstone = null,
    ): self {
        $instance = new self();
        $instance->timestamp = $timestamp;
        if ($comment !== null) {
            $instance->comment = $comment;
        }
        if ($handle !== null) {
            $instance->handle = $handle;
        }
        if ($pdsHost !== null) {
            $instance->pdsHost = $pdsHost;
        }
        if ($tombstone !== null) {
            $instance->tombstone = $tombstone;
        }

        return $instance;
    }
}
