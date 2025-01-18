<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetStarterPack;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.graph.getStarterPack';

    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\StarterPackView $starterPack;

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
        return ['starterPack'];
    }

    public static function new(
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\StarterPackView $starterPack = null,
    ): self {
        $instance = new self();
        if ($starterPack !== null) {
            $instance->starterPack = $starterPack;
        }

        return $instance;
    }
}
