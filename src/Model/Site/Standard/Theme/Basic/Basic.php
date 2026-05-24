<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Site\Standard\Theme\Basic;

/**
 * object
 */
class Basic implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'main';
    public const ID = 'site.standard.theme.basic';

    /** @var \Aazsamir\Libphpsky\Model\Site\Standard\Theme\Color\Rgb Color used for links and button backgrounds. */
    public mixed $accent;

    /** @var \Aazsamir\Libphpsky\Model\Site\Standard\Theme\Color\Rgb Color used for button text. */
    public mixed $accentForeground;

    /** @var \Aazsamir\Libphpsky\Model\Site\Standard\Theme\Color\Rgb Color used for content background. */
    public mixed $background;

    /** @var \Aazsamir\Libphpsky\Model\Site\Standard\Theme\Color\Rgb Color used for content text. */
    public mixed $foreground;

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
        return ['background', 'foreground', 'accent', 'accentForeground'];
    }

    public static function new(
        \Aazsamir\Libphpsky\Model\Site\Standard\Theme\Color\Rgb $accent,
        \Aazsamir\Libphpsky\Model\Site\Standard\Theme\Color\Rgb $accentForeground,
        \Aazsamir\Libphpsky\Model\Site\Standard\Theme\Color\Rgb $background,
        \Aazsamir\Libphpsky\Model\Site\Standard\Theme\Color\Rgb $foreground,
    ): self {
        $instance = new self();
        $instance->accent = $accent;
        $instance->accentForeground = $accentForeground;
        $instance->background = $background;
        $instance->foreground = $foreground;

        return $instance;
    }
}
