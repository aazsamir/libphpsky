<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\DescribeFeedGenerator;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.feed.describeFeedGenerator';

    public string $did;

    /** @var array<\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\DescribeFeedGenerator\Feed> */
    public array $feeds = [];
    public ?Links $links = null;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\DescribeFeedGenerator\Feed> $feeds
     */
    public static function new(string $did, array $feeds, ?Links $links = null): self
    {
        $instance = new self();
        $instance->did = $did;
        $instance->feeds = $feeds;
        $instance->links = $links;

        return $instance;
    }
}
