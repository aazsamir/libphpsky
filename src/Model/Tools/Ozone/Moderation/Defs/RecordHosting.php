<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class RecordHosting implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'recordHosting';
    public const ID = 'tools.ozone.moderation.defs';

    public string $status;
    public ?\DateTimeInterface $updatedAt;
    public ?\DateTimeInterface $createdAt;
    public ?\DateTimeInterface $deletedAt;

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
        return ['status'];
    }

    public static function new(
        string $status,
        ?\DateTimeInterface $updatedAt = null,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $deletedAt = null,
    ): self {
        $instance = new self();
        $instance->status = $status;
        if ($updatedAt !== null) {
            $instance->updatedAt = $updatedAt;
        }
        if ($createdAt !== null) {
            $instance->createdAt = $createdAt;
        }
        if ($deletedAt !== null) {
            $instance->deletedAt = $deletedAt;
        }

        return $instance;
    }
}
