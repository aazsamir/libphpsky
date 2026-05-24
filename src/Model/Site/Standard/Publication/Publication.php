<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Site\Standard\Publication;

/**
 * object
 */
class Publication implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'main';
    public const ID = 'site.standard.publication';

    /** @var ?\Aazsamir\Libphpsky\Model\Site\Standard\Theme\Basic\Basic Simplified publication theme for tools and apps to utilize when displaying content. */
    public ?\Aazsamir\Libphpsky\Model\Site\Standard\Theme\Basic\Basic $basicTheme;

    /** @var ?string Brief description of the publication. */
    public ?string $description;

    /** @var ?string Square image to identify the publication. Should be at least 256x256. */
    public ?string $icon;

    /** @var \Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\SelfLabels|null Self-label values for this publication. Effectively content warnings. */
    public mixed $labels;

    /** @var string Name of the publication. */
    public string $name;

    /** @var ?\Aazsamir\Libphpsky\Model\Site\Standard\Publication\Preferences Object containing platform specific preferences (with a few shared properties). */
    public ?Preferences $preferences;

    /** @var string Base publication url (ex: https://standard.site). The canonical document URL is formed by combining this value with the document path. */
    public string $url;

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
        return ['url', 'name'];
    }

    public static function new(
        string $name,
        string $url,
        ?\Aazsamir\Libphpsky\Model\Site\Standard\Theme\Basic\Basic $basicTheme = null,
        ?string $description = null,
        ?string $icon = null,
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\SelfLabels $labels = null,
        ?Preferences $preferences = null,
    ): self {
        $instance = new self();
        $instance->name = $name;
        $instance->url = $url;
        if ($basicTheme !== null) {
            $instance->basicTheme = $basicTheme;
        }
        if ($description !== null) {
            $instance->description = $description;
        }
        if ($icon !== null) {
            $instance->icon = $icon;
        }
        if ($labels !== null) {
            $instance->labels = $labels;
        }
        if ($preferences !== null) {
            $instance->preferences = $preferences;
        }

        return $instance;
    }
}
