<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class BlobView implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'blobView';
    public const ID = 'tools.ozone.moderation.defs';

    public string $cid;
    public string $mimeType;
    public int $size;
    public string $createdAt;
    public mixed $details = null;
    public ?Moderation $moderation = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        string $cid,
        string $mimeType,
        int $size,
        string $createdAt,
        mixed $details = null,
        ?Moderation $moderation = null,
    ): self {
        $instance = new self();
        $instance->cid = $cid;
        $instance->mimeType = $mimeType;
        $instance->size = $size;
        $instance->createdAt = $createdAt;
        $instance->details = $details;
        $instance->moderation = $moderation;

        return $instance;
    }
}
