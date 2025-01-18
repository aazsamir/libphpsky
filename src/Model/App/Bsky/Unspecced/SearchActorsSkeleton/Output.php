<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\SearchActorsSkeleton;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.unspecced.searchActorsSkeleton';

    public ?string $cursor;
    public ?int $hitsTotal;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs\SkeletonSearchActor> */
    public array $actors = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs\SkeletonSearchActor> $actors
     */
    public static function new(array $actors, ?string $cursor = null, ?int $hitsTotal = null): self
    {
        $instance = new self();
        $instance->actors = $actors;
        $instance->cursor = $cursor;
        $instance->hitsTotal = $hitsTotal;

        return $instance;
    }
}
