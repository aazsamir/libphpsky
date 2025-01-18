<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\SearchStarterPacksSkeleton;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.unspecced.searchStarterPacksSkeleton';

    public ?string $cursor;
    public ?int $hitsTotal;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs\SkeletonSearchStarterPack> */
    public array $starterPacks = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs\SkeletonSearchStarterPack> $starterPacks
     */
    public static function new(array $starterPacks, ?string $cursor = null, ?int $hitsTotal = null): self
    {
        $instance = new self();
        $instance->starterPacks = $starterPacks;
        $instance->cursor = $cursor;
        $instance->hitsTotal = $hitsTotal;

        return $instance;
    }
}
