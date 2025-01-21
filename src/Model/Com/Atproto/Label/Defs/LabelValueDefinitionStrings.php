<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs;

/**
 * Strings which describe the label in the UI, localized into a specific language.
 * object
 */
class LabelValueDefinitionStrings implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'labelValueDefinitionStrings';
    public const ID = 'com.atproto.label.defs';

    /** @var string The code of the language these strings are written in. */
    public string $lang;

    /** @var string A short human-readable name for the label. */
    public string $name;

    /** @var string A longer description of what the label means and why it might be applied. */
    public string $description;

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
        return ['lang', 'name', 'description'];
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
