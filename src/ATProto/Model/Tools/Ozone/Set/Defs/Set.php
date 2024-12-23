<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Set\Defs;

/**
 * object
 */
class Set implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'set';
    public const ID = 'tools.ozone.set.defs';

    public string $name;
    public ?string $description = null;

    public static function id(): string
    {
        return self::ID;
    }
}
