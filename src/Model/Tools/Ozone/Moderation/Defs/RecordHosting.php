<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class RecordHosting implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'recordHosting';
    public const ID = 'tools.ozone.moderation.defs';

    public string $status;
    public ?\DateTimeInterface $updatedAt = null;
    public ?\DateTimeInterface $createdAt = null;
    public ?\DateTimeInterface $deletedAt = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        string $status,
        ?\DateTimeInterface $updatedAt = null,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $deletedAt = null,
    ): self {
        $instance = new self();
        $instance->status = $status;
        $instance->updatedAt = $updatedAt;
        $instance->createdAt = $createdAt;
        $instance->deletedAt = $deletedAt;

        return $instance;
    }
}
