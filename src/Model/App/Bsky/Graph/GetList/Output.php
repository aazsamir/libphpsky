<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetList;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.graph.getList';

    public ?string $cursor;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\ListView $list;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\ListItemView> */
    public array $items = [];

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
        return ['list', 'items'];
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
        if ($cursor !== null) {
            $instance->cursor = $cursor;
        }
        if ($list !== null) {
            $instance->list = $list;
        }

        return $instance;
    }
}
