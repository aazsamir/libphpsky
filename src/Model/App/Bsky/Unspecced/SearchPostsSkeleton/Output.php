<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\SearchPostsSkeleton;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.unspecced.searchPostsSkeleton';

    public ?string $cursor;
    public ?int $hitsTotal;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs\SkeletonSearchPost> */
    public array $posts = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs\SkeletonSearchPost> $posts
     */
    public static function new(array $posts, ?string $cursor = null, ?int $hitsTotal = null): self
    {
        $instance = new self();
        $instance->posts = $posts;
        $instance->cursor = $cursor;
        $instance->hitsTotal = $hitsTotal;

        return $instance;
    }
}
