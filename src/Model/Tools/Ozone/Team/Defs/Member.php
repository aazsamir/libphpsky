<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Team\Defs;

/**
 * object
 */
class Member implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'member';
    public const ID = 'tools.ozone.team.defs';

    public string $did;
    public ?bool $disabled = null;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileViewDetailed $profile = null;
    public ?string $createdAt = null;
    public ?string $updatedAt = null;
    public ?string $lastUpdatedBy = null;
    public string $role;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        string $did,
        string $role,
        ?bool $disabled = null,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileViewDetailed $profile = null,
        ?string $createdAt = null,
        ?string $updatedAt = null,
        ?string $lastUpdatedBy = null,
    ): self {
        $instance = new self();
        $instance->did = $did;
        $instance->role = $role;
        $instance->disabled = $disabled;
        $instance->profile = $profile;
        $instance->createdAt = $createdAt;
        $instance->updatedAt = $updatedAt;
        $instance->lastUpdatedBy = $lastUpdatedBy;

        return $instance;
    }
}
