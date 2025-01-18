<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs;

/**
 * object
 */
class LabelValueDefinitionStrings implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'labelValueDefinitionStrings';
    public const ID = 'com.atproto.label.defs';

    public string $lang;
    public string $name;
    public string $description;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $lang, string $name, string $description): self
    {
        $instance = new self();
        $instance->lang = $lang;
        $instance->name = $name;
        $instance->description = $description;

        return $instance;
    }
}
