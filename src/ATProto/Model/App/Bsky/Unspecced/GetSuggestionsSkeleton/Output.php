<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Unspecced\GetSuggestionsSkeleton;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.unspecced.getSuggestionsSkeleton';

    public ?string $cursor = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Unspecced\Defs\SkeletonSearchActor[] */
    public array $actors = [];
    public ?string $relativeToDid = null;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Unspecced\Defs\SkeletonSearchActor[] $actors
     */
    public static function new(array $actors, ?string $cursor = null, ?string $relativeToDid = null): self
    {
        $instance = new self();
        $instance->actors = $actors;
        $instance->cursor = $cursor;
        $instance->relativeToDid = $relativeToDid;

        return $instance;
    }
}
