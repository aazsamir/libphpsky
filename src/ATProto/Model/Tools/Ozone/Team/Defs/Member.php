<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Team\Defs;

/**
 * object
 */
class Member implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'member';
    public const ID = 'tools.ozone.team.defs';

    public string $did;
    public ?bool $disabled = null;
    public ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ProfileViewDetailed $profile = null;
    public ?string $createdAt = null;
    public ?string $updatedAt = null;
    public ?string $lastUpdatedBy = null;
    public string $role;

    public static function id(): string
    {
        return self::ID;
    }
}
