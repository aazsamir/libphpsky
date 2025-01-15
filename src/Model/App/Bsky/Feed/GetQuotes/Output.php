<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetQuotes;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.feed.getQuotes';

    public string $uri;
    public ?string $cid = null;
    public ?string $cursor = null;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\PostView> */
    public array $posts = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\PostView> $posts
     */
    public static function new(string $uri, array $posts, ?string $cid = null, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->uri = $uri;
        $instance->posts = $posts;
        $instance->cid = $cid;
        $instance->cursor = $cursor;

        return $instance;
    }
}
