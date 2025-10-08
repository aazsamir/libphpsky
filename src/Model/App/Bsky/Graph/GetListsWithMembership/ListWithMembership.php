<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetListsWithMembership;

/**
 * A list and an optional list item indicating membership of a target user to that list.
 * object
 */
class ListWithMembership implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'listWithMembership';
    public const ID = 'app.bsky.graph.getListsWithMembership';

    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\ListView $list;
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
        return ['list'];
    }

    public static function new(
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\ListView $list = null,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\ListItemView $listItem = null,
    ): self {
        $instance = new self();
        if ($list !== null) {
            $instance->list = $list;
        }
        if ($listItem !== null) {
            $instance->listItem = $listItem;
        }

        return $instance;
    }
}
