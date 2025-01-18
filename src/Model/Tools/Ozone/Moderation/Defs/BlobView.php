<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class BlobView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'blobView';
    public const ID = 'tools.ozone.moderation.defs';

    public string $cid;
    public string $mimeType;
    public int $size;
    public \DateTimeInterface $createdAt;

    /** @var \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\ImageDetails|\Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs\VideoDetails|null */
    public mixed $details;
    public ?Moderation $moderation;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        string $cid,
        string $mimeType,
        int $size,
        \DateTimeInterface $createdAt,
        ImageDetails|VideoDetails|null $details = null,
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
