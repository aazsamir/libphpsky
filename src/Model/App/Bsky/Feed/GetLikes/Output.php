<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetLikes;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.feed.getLikes';

    public string $uri;
    public ?string $cid;
    public ?string $cursor;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetLikes\Like> */
    public array $likes = [];

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
        return ['uri', 'likes'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetLikes\Like> $likes
     */
    public static function new(string $uri, array $likes, ?string $cid = null, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->uri = $uri;
        $instance->likes = $likes;
        if ($cid !== null) {
            $instance->cid = $cid;
        }
        if ($cursor !== null) {
            $instance->cursor = $cursor;
        }

        return $instance;
    }
}
