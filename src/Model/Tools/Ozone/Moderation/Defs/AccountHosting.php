<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class AccountHosting implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'accountHosting';
    public const ID = 'tools.ozone.moderation.defs';

    public string $status;
    public ?\DateTimeInterface $updatedAt;
    public ?\DateTimeInterface $createdAt;
    public ?\DateTimeInterface $deletedAt;
    public ?\DateTimeInterface $deactivatedAt;
    public ?\DateTimeInterface $reactivatedAt;

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
        ?\DateTimeInterface $deactivatedAt = null,
        ?\DateTimeInterface $reactivatedAt = null,
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
        if ($deactivatedAt !== null) {
            $instance->deactivatedAt = $deactivatedAt;
        }
        if ($reactivatedAt !== null) {
            $instance->reactivatedAt = $reactivatedAt;
        }

        return $instance;
    }
}
