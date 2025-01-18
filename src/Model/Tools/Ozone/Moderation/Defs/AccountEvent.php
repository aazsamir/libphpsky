<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class AccountEvent implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'accountEvent';
    public const ID = 'tools.ozone.moderation.defs';

    public ?string $comment;
    public bool $active;
    public ?string $status;
    public \DateTimeInterface $timestamp;

    public static function id(): string
    {
        return self::ID;
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
        $instance->comment = $comment;
        $instance->status = $status;

        return $instance;
    }
}
