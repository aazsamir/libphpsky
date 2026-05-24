<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Site\Standard\Theme\Color;

/**
 * object
 */
class Rgba implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'rgba';
    public const ID = 'site.standard.theme.color';

    public int $a;
    public int $b;
    public int $g;
    public int $r;

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
        return ['r', 'g', 'b', 'a'];
    }

    public static function new(int $a, int $b, int $g, int $r): self
    {
        $instance = new self();
        $instance->a = $a;
        $instance->b = $b;
        $instance->g = $g;
        $instance->r = $r;

        return $instance;
    }
}
