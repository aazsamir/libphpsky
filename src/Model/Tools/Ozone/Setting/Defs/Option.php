<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Setting\Defs;

/**
 * object
 */
class Option implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'option';
    public const ID = 'tools.ozone.setting.defs';

    public string $key;
    public string $did;
    public mixed $value;
    public ?string $description;
    public ?\DateTimeInterface $createdAt;
    public ?\DateTimeInterface $updatedAt;
    public ?string $managerRole;
    public string $scope;
    public string $createdBy;
    public string $lastUpdatedBy;

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
        return ['key', 'value', 'did', 'scope', 'createdBy', 'lastUpdatedBy'];
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
        if ($description !== null) {
            $instance->description = $description;
        }
        if ($createdAt !== null) {
            $instance->createdAt = $createdAt;
        }
        if ($updatedAt !== null) {
            $instance->updatedAt = $updatedAt;
        }
        if ($managerRole !== null) {
            $instance->managerRole = $managerRole;
        }

        return $instance;
    }
}
