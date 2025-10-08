<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetFeedSkeleton;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.feed.getFeedSkeleton';

    public ?string $cursor;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\SkeletonFeedPost> */
    public array $feed = [];

    /** @var ?string Unique identifier per request that may be passed back alongside interactions. */
    public ?string $reqId;

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
        return ['feed'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\SkeletonFeedPost> $feed
     */
    public static function new(array $feed, ?string $cursor = null, ?string $reqId = null): self
    {
        $instance = new self();
        $instance->feed = $feed;
        if ($cursor !== null) {
            $instance->cursor = $cursor;
        }
        if ($reqId !== null) {
            $instance->reqId = $reqId;
        }

        return $instance;
    }
}
