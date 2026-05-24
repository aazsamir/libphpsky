<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Embed\External;

/**
 * RGB color definition, inspired by site.standard.theme.color#rgb
 * object
 */
class ColorRGB implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'colorRGB';
    public const ID = 'app.bsky.embed.external';

    public int $r;
    public int $g;
    public int $b;

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
        return ['r', 'g', 'b'];
    }

    public static function new(int $r, int $g, int $b): self
    {
        $instance = new self();
        $instance->r = $r;
        $instance->g = $g;
        $instance->b = $b;

        return $instance;
    }
}
