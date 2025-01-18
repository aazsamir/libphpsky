<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs;

/**
 * object
 */
class LabelValueDefinition implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'labelValueDefinition';
    public const ID = 'com.atproto.label.defs';

    public string $identifier;
    public string $severity;
    public string $blurs;
    public ?string $defaultSetting;
    public ?bool $adultOnly;

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\LabelValueDefinitionStrings> */
    public array $locales = [];

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
        return ['identifier', 'severity', 'blurs', 'locales'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\LabelValueDefinitionStrings> $locales
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
        if ($defaultSetting !== null) {
            $instance->defaultSetting = $defaultSetting;
        }
        if ($adultOnly !== null) {
            $instance->adultOnly = $adultOnly;
        }

        return $instance;
    }
}
