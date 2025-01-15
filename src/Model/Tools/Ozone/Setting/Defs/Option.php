<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Setting\Defs;

/**
 * object
 */
class Option implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'option';
    public const ID = 'tools.ozone.setting.defs';

    public string $key;
    public string $did;
    public mixed $value;
    public ?string $description = null;
    public ?\DateTimeInterface $createdAt = null;
    public ?\DateTimeInterface $updatedAt = null;
    public ?string $managerRole = null;
    public string $scope;
    public string $createdBy;
    public string $lastUpdatedBy;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        string $key,
        string $did,
        mixed $value,
        string $scope,
        string $createdBy,
        string $lastUpdatedBy,
        ?string $description = null,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $updatedAt = null,
        ?string $managerRole = null,
    ): self {
        $instance = new self();
        $instance->key = $key;
        $instance->did = $did;
        $instance->value = $value;
        $instance->scope = $scope;
        $instance->createdBy = $createdBy;
        $instance->lastUpdatedBy = $lastUpdatedBy;
        $instance->description = $description;
        $instance->createdAt = $createdAt;
        $instance->updatedAt = $updatedAt;
        $instance->managerRole = $managerRole;

        return $instance;
    }
}