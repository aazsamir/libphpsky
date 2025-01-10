<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class HiddenPostsPref implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'hiddenPostsPref';
    public const ID = 'app.bsky.actor.defs';

    /** @var string[] */
    public array $items = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param string[] $items
     */
    public static function new(array $items): self
    {
        $instance = new self();
        $instance->items = $items;

        return $instance;
    }
}
