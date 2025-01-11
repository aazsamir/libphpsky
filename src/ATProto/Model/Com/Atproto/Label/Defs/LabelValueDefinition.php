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

    /** @var array<\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs\LabelValueDefinitionStrings> */
    public array $locales = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs\LabelValueDefinitionStrings> $locales
     */
    public static function new(
        string $identifier,
        string $severity,
        string $blurs,
        array $locales,
        ?string $defaultSetting = null,
        ?bool $adultOnly = null,
    ): self {
        $instance = new self();
        $instance->identifier = $identifier;
        $instance->severity = $severity;
        $instance->blurs = $blurs;
        $instance->locales = $locales;
        $instance->defaultSetting = $defaultSetting;
        $instance->adultOnly = $adultOnly;

        return $instance;
    }
}
