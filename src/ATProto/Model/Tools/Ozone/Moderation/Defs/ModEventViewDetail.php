<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class ModEventViewDetail implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'modEventViewDetail';
    public const ID = 'tools.ozone.moderation.defs';

    public int $id;
    public mixed $event;
    public mixed $subject;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs\BlobView[] */
    public array $subjectBlobs = [];
    public string $createdBy;
    public string $createdAt;

    public static function id(): string
    {
        return self::ID;
    }
}
