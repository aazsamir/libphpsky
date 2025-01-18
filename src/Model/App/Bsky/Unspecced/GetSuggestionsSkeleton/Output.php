<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetSuggestionsSkeleton;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.unspecced.getSuggestionsSkeleton';

    public ?string $cursor;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs\SkeletonSearchActor> */
    public array $actors = [];
    public ?string $relativeToDid;
    public ?int $recId;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs\SkeletonSearchActor> $actors
     */
    public static function new(
        array $actors,
        ?string $cursor = null,
        ?string $relativeToDid = null,
        ?int $recId = null,
    ): self {
        $instance = new self();
        $instance->actors = $actors;
        $instance->cursor = $cursor;
        $instance->relativeToDid = $relativeToDid;
        $instance->recId = $recId;

        return $instance;
    }
}
