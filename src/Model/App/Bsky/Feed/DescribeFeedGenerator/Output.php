<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\DescribeFeedGenerator;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.feed.describeFeedGenerator';

    public string $did;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\DescribeFeedGenerator\Feed> */
    public array $feeds = [];
    public ?Links $links;

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
        return ['did', 'feeds'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\DescribeFeedGenerator\Feed> $feeds
     */
    public static function new(string $did, array $feeds, ?Links $links = null): self
    {
        $instance = new self();
        $instance->did = $did;
        $instance->feeds = $feeds;
        if ($links !== null) {
            $instance->links = $links;
        }

        return $instance;
    }
}
