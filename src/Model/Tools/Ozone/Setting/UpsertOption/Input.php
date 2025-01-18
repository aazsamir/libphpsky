<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Setting\UpsertOption;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.setting.upsertOption';

    public string $key;
    public string $scope;
    public mixed $value;
    public ?string $description;
    public ?string $managerRole;

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
        return ['key', 'scope', 'value'];
    }

    public static function new(
        string $key,
        string $scope,
        mixed $value,
        ?string $description = null,
        ?string $managerRole = null,
    ): self {
        $instance = new self();
        $instance->key = $key;
        $instance->scope = $scope;
        $instance->value = $value;
        if ($description !== null) {
            $instance->description = $description;
        }
        if ($managerRole !== null) {
            $instance->managerRole = $managerRole;
        }

        return $instance;
    }
}
