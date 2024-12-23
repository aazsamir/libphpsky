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
}
