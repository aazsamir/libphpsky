<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class HiddenPostsPref implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'hiddenPostsPref';
    public const ID = 'app.bsky.actor.defs';

    /** @var array<string> */
    public array $items = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<string> $items
     */
    public static function new(array $items): self
    {
        $instance = new self();
        $instance->items = $items;

        return $instance;
    }
}
