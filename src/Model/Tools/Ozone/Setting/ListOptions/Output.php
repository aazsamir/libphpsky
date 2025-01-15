<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Setting\ListOptions;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.setting.listOptions';

    public ?string $cursor = null;

    /** @var array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Setting\Defs\Option> */
    public array $options = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Setting\Defs\Option> $options
     */
    public static function new(array $options, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->options = $options;
        $instance->cursor = $cursor;

        return $instance;
    }
}
