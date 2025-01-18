<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Set\Defs;

/**
 * object
 */
class Set implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'set';
    public const ID = 'tools.ozone.set.defs';

    public string $name;
    public ?string $description;

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
        return ['name'];
    }

    public static function new(string $name, ?string $description = null): self
    {
        $instance = new self();
        $instance->name = $name;
        if ($description !== null) {
            $instance->description = $description;
        }

        return $instance;
    }
}
