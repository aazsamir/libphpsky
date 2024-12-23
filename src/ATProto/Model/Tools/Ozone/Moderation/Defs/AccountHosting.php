<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class AccountHosting implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

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
}
