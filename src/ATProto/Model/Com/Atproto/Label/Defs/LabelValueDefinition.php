<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs;

/**
 * object
 */
class LabelValueDefinition implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'labelValueDefinition';
    public const ID = 'com.atproto.label.defs';

    public string $identifier;
    public string $severity;
    public string $blurs;
    public ?string $defaultSetting = null;
    public ?bool $adultOnly = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs\LabelValueDefinitionStrings[] */
    public array $locales = [];

    public static function id(): string
    {
        return self::ID;
    }
}
