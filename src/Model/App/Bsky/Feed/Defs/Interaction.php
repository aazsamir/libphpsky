<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs;

/**
 * object
 */
class Interaction implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'interaction';
    public const ID = 'app.bsky.feed.defs';

    public ?string $item;
    public ?string $event;

    /** @var ?string Context on a feed item that was originally supplied by the feed generator on getFeedSkeleton. */
    public ?string $feedContext;

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
        return [];
    }

    public static function new(?string $item = null, ?string $event = null, ?string $feedContext = null): self
    {
        $instance = new self();
        if ($item !== null) {
            $instance->item = $item;
        }
        if ($event !== null) {
            $instance->event = $event;
        }
        if ($feedContext !== null) {
            $instance->feedContext = $feedContext;
        }

        return $instance;
    }
}
