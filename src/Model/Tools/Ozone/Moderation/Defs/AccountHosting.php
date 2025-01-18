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
    public ?\DateTimeInterface $updatedAt = null;
    public ?\DateTimeInterface $createdAt = null;
    public ?\DateTimeInterface $deletedAt = null;
    public ?\DateTimeInterface $deactivatedAt = null;
    public ?\DateTimeInterface $reactivatedAt = null;

    public static function id(): string
    {
        return self::ID;
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
        $instance->updatedAt = $updatedAt;
        $instance->createdAt = $createdAt;
        $instance->deletedAt = $deletedAt;
        $instance->deactivatedAt = $deactivatedAt;
        $instance->reactivatedAt = $reactivatedAt;

        return $instance;
    }
}
