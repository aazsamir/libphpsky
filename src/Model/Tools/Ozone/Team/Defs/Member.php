<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Team\Defs;

/**
 * object
 */
class Member implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'member';
    public const ID = 'tools.ozone.team.defs';

    public string $did;
    public ?bool $disabled;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileViewDetailed $profile;
    public ?\DateTimeInterface $createdAt;
    public ?\DateTimeInterface $updatedAt;
    public ?string $lastUpdatedBy;
    public string $role;

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public static function nullable(): array
    {
        return [];
    }

    public static function required(): array
    {
        return ['did', 'role'];
    }

    public static function new(
        string $did,
        string $role,
        ?bool $disabled = null,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileViewDetailed $profile = null,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $updatedAt = null,
        ?string $lastUpdatedBy = null,
    ): self {
        $instance = new self();
        $instance->did = $did;
        $instance->role = $role;
        if ($disabled !== null) {
            $instance->disabled = $disabled;
        }
        if ($profile !== null) {
            $instance->profile = $profile;
        }
        if ($createdAt !== null) {
            $instance->createdAt = $createdAt;
        }
        if ($updatedAt !== null) {
            $instance->updatedAt = $updatedAt;
        }
        if ($lastUpdatedBy !== null) {
            $instance->lastUpdatedBy = $lastUpdatedBy;
        }

        return $instance;
    }
}
