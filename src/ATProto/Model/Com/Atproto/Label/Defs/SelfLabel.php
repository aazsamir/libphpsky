<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs;

/**
 * object
 */
class SelfLabel implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'selfLabel';
    public const ID = 'com.atproto.label.defs';

    public string $val;

    public static function id(): string
    {
        return self::ID;
    }
}
