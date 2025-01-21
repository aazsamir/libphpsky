<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs;

/**
 * Declares a label value and its expected interpretations and behaviors.
 * object
 */
class LabelValueDefinition implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'labelValueDefinition';
    public const ID = 'com.atproto.label.defs';

    /** @var string The value of the label being defined. Must only include lowercase ascii and the '-' character ([a-z-]+). */
    public string $identifier;

    /** @var string How should a client visually convey this label? 'inform' means neutral and informational; 'alert' means negative and warning; 'none' means show nothing. */
    public string $severity;

    /** @var string What should this label hide in the UI, if applied? 'content' hides all of the target; 'media' hides the images/video/audio; 'none' hides nothing. */
    public string $blurs;

    /** @var ?string The default setting for this label. */
    public ?string $defaultSetting;

    /** @var ?bool Does the user need to have adult content enabled in order to configure this label? */
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
