<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetSuggestedFeeds;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.feed.getSuggestedFeeds';

    public ?string $cursor = null;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\GeneratorView> */
    public array $feeds = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\GeneratorView> $feeds
     */
    public static function new(array $feeds, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->feeds = $feeds;
        $instance->cursor = $cursor;

        return $instance;
    }
}
