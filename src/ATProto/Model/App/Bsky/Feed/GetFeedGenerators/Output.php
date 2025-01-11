<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\GetFeedGenerators;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.feed.getFeedGenerators';

    /** @var array<\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs\GeneratorView> */
    public array $feeds = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs\GeneratorView> $feeds
     */
    public static function new(array $feeds): self
    {
        $instance = new self();
        $instance->feeds = $feeds;

        return $instance;
    }
}
