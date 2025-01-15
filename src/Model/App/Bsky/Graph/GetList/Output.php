<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetList;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.graph.getList';

    public ?string $cursor = null;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\ListView $list = null;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\ListItemView> */
    public array $items = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\ListItemView> $items
     */
    public static function new(
        array $items,
        ?string $cursor = null,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\ListView $list = null,
    ): self {
        $instance = new self();
        $instance->items = $items;
        $instance->cursor = $cursor;
        $instance->list = $list;

        return $instance;
    }
}
