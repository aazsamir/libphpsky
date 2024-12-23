<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Signature\Defs;

/**
 * object
 */
class SigDetail implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'sigDetail';
    public const ID = 'tools.ozone.signature.defs';

    public string $property;
    public string $value;

    public static function id(): string
    {
        return self::ID;
    }
}
