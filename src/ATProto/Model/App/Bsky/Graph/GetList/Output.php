<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\GetList;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.graph.getList';

    public ?string $cursor = null;
    public ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\Defs\ListView $list = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\Defs\ListItemView[] */
    public array $items = [];

    public static function id(): string
    {
        return self::ID;
    }
}
