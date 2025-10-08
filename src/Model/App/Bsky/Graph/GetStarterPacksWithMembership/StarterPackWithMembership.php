<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetStarterPacksWithMembership;

/**
 * A starter pack and an optional list item indicating membership of a target user to that starter pack.
 * object
 */
class StarterPackWithMembership implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'starterPackWithMembership';
    public const ID = 'app.bsky.graph.getStarterPacksWithMembership';

    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\StarterPackView $starterPack;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\ListItemView $listItem;

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
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\ListItemView $listItem = null,
    ): self {
        $instance = new self();
        if ($starterPack !== null) {
            $instance->starterPack = $starterPack;
        }
        if ($listItem !== null) {
            $instance->listItem = $listItem;
        }

        return $instance;
    }
}
