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

    /** @var ?int Count of search hits. Optional, may be rounded/truncated, and may not be possible to paginate through all hits. */
    public ?int $hitsTotal;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs\SkeletonSearchPost> */
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
        return ['posts'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs\SkeletonSearchPost> $posts
     */
    public static function new(array $posts, ?string $cursor = null, ?int $hitsTotal = null): self
    {
        $instance = new self();
        $instance->posts = $posts;
        if ($cursor !== null) {
            $instance->cursor = $cursor;
        }
        if ($hitsTotal !== null) {
            $instance->hitsTotal = $hitsTotal;
        }

        return $instance;
    }
}
