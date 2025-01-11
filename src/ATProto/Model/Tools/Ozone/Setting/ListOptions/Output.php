<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Setting\ListOptions;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.setting.listOptions';

    public ?string $cursor = null;

    /** @var array<\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Setting\Defs\Option> */
    public array $options = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Setting\Defs\Option> $options
     */
    public static function new(array $options, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->options = $options;
        $instance->cursor = $cursor;

        return $instance;
    }
}
