<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetQuotes;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.feed.getQuotes';

    public string $uri;
    public ?string $cid;
    public ?string $cursor;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\PostView> */
    public array $posts = [];

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
        return ['uri', 'posts'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\PostView> $posts
     */
    public static function new(string $uri, array $posts, ?string $cid = null, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->uri = $uri;
        $instance->posts = $posts;
        if ($cid !== null) {
            $instance->cid = $cid;
        }
        if ($cursor !== null) {
            $instance->cursor = $cursor;
        }

        return $instance;
    }
}
