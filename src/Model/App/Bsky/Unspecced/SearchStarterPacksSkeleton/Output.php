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

    /** @var ?int Count of search hits. Optional, may be rounded/truncated, and may not be possible to paginate through all hits. */
    public ?int $hitsTotal;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs\SkeletonSearchStarterPack> */
    public array $starterPacks = [];

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
        return ['starterPacks'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs\SkeletonSearchStarterPack> $starterPacks
     */
    public static function new(array $starterPacks, ?string $cursor = null, ?int $hitsTotal = null): self
    {
        $instance = new self();
        $instance->starterPacks = $starterPacks;
        if ($cursor !== null) {
            $instance->cursor = $cursor;
        }
        if ($hitsTotal !== null) {
            $instance->hitsTotal = $hitsTotal;
        }

        return $instance;
    }
}
