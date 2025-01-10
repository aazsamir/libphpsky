<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\GetStarterPack;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.graph.getStarterPack';

    public ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\Defs\StarterPackView $starterPack = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\Defs\StarterPackView $starterPack = null,
    ): self {
        $instance = new self();
        $instance->starterPack = $starterPack;

        return $instance;
    }
}
