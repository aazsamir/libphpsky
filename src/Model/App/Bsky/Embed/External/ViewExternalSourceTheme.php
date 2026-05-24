<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Embed\External;

/**
 * The theme colors of an external source, such as a site.standard.publication. These colors may be used when rendering an embed from that source.
 * object
 */
class ViewExternalSourceTheme implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'viewExternalSourceTheme';
    public const ID = 'app.bsky.embed.external';

    public ?ColorRGB $backgroundRGB;
    public ?ColorRGB $foregroundRGB;
    public ?ColorRGB $accentRGB;
    public ?ColorRGB $accentForegroundRGB;

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
        return [];
    }

    public static function new(
        ?ColorRGB $backgroundRGB = null,
        ?ColorRGB $foregroundRGB = null,
        ?ColorRGB $accentRGB = null,
        ?ColorRGB $accentForegroundRGB = null,
    ): self {
        $instance = new self();
        if ($backgroundRGB !== null) {
            $instance->backgroundRGB = $backgroundRGB;
        }
        if ($foregroundRGB !== null) {
            $instance->foregroundRGB = $foregroundRGB;
        }
        if ($accentRGB !== null) {
            $instance->accentRGB = $accentRGB;
        }
        if ($accentForegroundRGB !== null) {
            $instance->accentForegroundRGB = $accentForegroundRGB;
        }

        return $instance;
    }
}
