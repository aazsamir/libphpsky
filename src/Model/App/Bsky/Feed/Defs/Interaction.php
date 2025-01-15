<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs;

/**
 * object
 */
class Interaction implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'interaction';
    public const ID = 'app.bsky.feed.defs';

    public ?string $item = null;
    public ?string $event = null;
    public ?string $feedContext = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(?string $item = null, ?string $event = null, ?string $feedContext = null): self
    {
        $instance = new self();
        $instance->item = $item;
        $instance->event = $event;
        $instance->feedContext = $feedContext;

        return $instance;
    }
}
