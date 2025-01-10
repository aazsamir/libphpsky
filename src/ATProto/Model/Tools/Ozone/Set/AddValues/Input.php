<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Set\AddValues;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.set.addValues';

    public string $name;

    /** @var string[] */
    public array $values = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param string[] $values
     */
    public static function new(string $name, array $values): self
    {
        $instance = new self();
        $instance->name = $name;
        $instance->values = $values;

        return $instance;
    }
}
