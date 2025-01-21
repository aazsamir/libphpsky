<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Set\AddValues;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.set.addValues';

    /** @var string Name of the set to add values to */
    public string $name;

    /** @var array<string> Array of string values to add to the set */
    public array $values = [];

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
        return ['name', 'values'];
    }

    /**
     * @param array<string> $values
     */
    public static function new(string $name, array $values): self
    {
        $instance = new self();
        $instance->name = $name;
        $instance->values = $values;

        return $instance;
    }
}
