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
}
