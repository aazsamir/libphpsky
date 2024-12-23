<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs;

/**
 * object
 */
class LabelValueDefinitionStrings implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'labelValueDefinitionStrings';
    public const ID = 'com.atproto.label.defs';

    public string $lang;
    public string $name;
    public string $description;

    public static function id(): string
    {
        return self::ID;
    }
}
