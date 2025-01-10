<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\GetPosts;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.feed.getPosts';

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs\PostView[] */
    public array $posts = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs\PostView[] $posts
     */
    public static function new(array $posts): self
    {
        $instance = new self();
        $instance->posts = $posts;

        return $instance;
    }
}
