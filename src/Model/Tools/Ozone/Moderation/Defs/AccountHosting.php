<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class AccountHosting implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'accountHosting';
    public const ID = 'tools.ozone.moderation.defs';

    public string $status;
    public ?string $updatedAt = null;
    public ?string $createdAt = null;
    public ?string $deletedAt = null;
    public ?string $deactivatedAt = null;
    public ?string $reactivatedAt = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        string $status,
        ?string $updatedAt = null,
        ?string $createdAt = null,
        ?string $deletedAt = null,
        ?string $deactivatedAt = null,
        ?string $reactivatedAt = null,
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
