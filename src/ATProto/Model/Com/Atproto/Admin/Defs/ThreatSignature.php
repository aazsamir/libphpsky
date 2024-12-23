<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\Defs;

/**
 * object
 */
class ThreatSignature implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'threatSignature';
    public const ID = 'com.atproto.admin.defs';

    public string $property;
    public string $value;

    public static function id(): string
    {
        return self::ID;
    }
}
