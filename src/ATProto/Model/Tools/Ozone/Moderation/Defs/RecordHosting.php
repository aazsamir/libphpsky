<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class RecordHosting implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'recordHosting';
    public const ID = 'tools.ozone.moderation.defs';

    public string $status;
    public ?string $updatedAt = null;
    public ?string $createdAt = null;
    public ?string $deletedAt = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        string $status,
        ?string $updatedAt = null,
        ?string $createdAt = null,
        ?string $deletedAt = null,
    ): self {
        $instance = new self();
        $instance->status = $status;
        $instance->updatedAt = $updatedAt;
        $instance->createdAt = $createdAt;
        $instance->deletedAt = $deletedAt;

        return $instance;
    }
}
