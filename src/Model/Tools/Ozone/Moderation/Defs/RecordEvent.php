<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class RecordEvent implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'recordEvent';
    public const ID = 'tools.ozone.moderation.defs';

    public ?string $comment = null;
    public string $op;
    public ?string $cid = null;
    public \DateTimeInterface $timestamp;

    public static function id(): string
    {
        return self::ID;
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
        $instance->comment = $comment;
        $instance->cid = $cid;

        return $instance;
    }
}
