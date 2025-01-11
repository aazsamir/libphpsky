<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\GetListMutes;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.graph.getListMutes';

    public ?string $cursor = null;

    /** @var array<\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\Defs\ListView> */
    public array $lists = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\Defs\ListView> $lists
     */
    public static function new(array $lists, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->lists = $lists;
        $instance->cursor = $cursor;

        return $instance;
    }
}
