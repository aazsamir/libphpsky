<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\GetFeed;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.feed.getFeed';

    public ?string $cursor = null;

    /** @var array<\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs\FeedViewPost> */
    public array $feed = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs\FeedViewPost> $feed
     */
    public static function new(array $feed, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->feed = $feed;
        $instance->cursor = $cursor;

        return $instance;
    }
}
