<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Setting\UpsertOption;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.setting.upsertOption';

    public \Aazsamir\Libphpsky\Model\Tools\Ozone\Setting\Defs\Option $option;

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
        return ['option'];
    }

    public static function new(\Aazsamir\Libphpsky\Model\Tools\Ozone\Setting\Defs\Option $option): self
    {
        $instance = new self();
        $instance->option = $option;

        return $instance;
    }
}
