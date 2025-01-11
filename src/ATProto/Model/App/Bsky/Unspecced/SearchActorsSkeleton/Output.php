<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Unspecced\SearchActorsSkeleton;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.unspecced.searchActorsSkeleton';

    public ?string $cursor = null;
    public ?int $hitsTotal = null;

    /** @var array<\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Unspecced\Defs\SkeletonSearchActor> */
    public array $actors = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Unspecced\Defs\SkeletonSearchActor> $actors
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
