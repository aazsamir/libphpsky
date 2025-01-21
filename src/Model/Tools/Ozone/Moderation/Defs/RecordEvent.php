<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * Logs lifecycle event on a record subject. Normally captured by automod from the firehose and emitted to ozone for historical tracking.
 * object
 */
class RecordEvent implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'recordEvent';
    public const ID = 'tools.ozone.moderation.defs';

    public ?string $comment;
    public string $op;
    public ?string $cid;
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
        return ['timestamp', 'op'];
    }

    public static function new(
        string $op,
        \DateTimeInterface $timestamp,
        ?string $comment = null,
        ?string $cid = null,
    ): self {
        $instance = new self();
        $instance->op = $op;
        $instance->timestamp = $timestamp;
        if ($comment !== null) {
            $instance->comment = $comment;
        }
        if ($cid !== null) {
            $instance->cid = $cid;
        }

        return $instance;
    }
}
