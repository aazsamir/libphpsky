<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Setting\UpsertOption;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.setting.upsertOption';

    public \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Setting\Defs\Option $option;

    public static function id(): string
    {
        return self::ID;
    }
}
