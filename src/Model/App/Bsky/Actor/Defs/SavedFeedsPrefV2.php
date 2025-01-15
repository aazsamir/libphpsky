<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class SavedFeedsPrefV2 implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'savedFeedsPrefV2';
    public const ID = 'app.bsky.actor.defs';

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\SavedFeed> */
    public array $items = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\SavedFeed> $items
     */
    public static function new(array $items): self
    {
        $instance = new self();
        $instance->items = $items;

        return $instance;
    }
}
