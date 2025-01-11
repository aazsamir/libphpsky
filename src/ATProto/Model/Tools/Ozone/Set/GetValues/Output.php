<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Set\GetValues;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.set.getValues';

    public ?\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Set\Defs\SetView $set = null;

    /** @var array<string> */
    public array $values = [];
    public ?string $cursor = null;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<string> $values
     */
    public static function new(
        array $values,
        ?\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Set\Defs\SetView $set = null,
        ?string $cursor = null,
    ): self {
        $instance = new self();
        $instance->values = $values;
        $instance->set = $set;
        $instance->cursor = $cursor;

        return $instance;
    }
}
