<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Unspecced\SearchPostsSkeleton;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.unspecced.searchPostsSkeleton';

    public ?string $cursor = null;
    public ?int $hitsTotal = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Unspecced\Defs\SkeletonSearchPost[] */
    public array $posts = [];

    public static function id(): string
    {
        return self::ID;
    }
}
