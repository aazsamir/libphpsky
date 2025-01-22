<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs;

/**
 * Metadata about this post within the context of the thread it is in.
 * object
 */
class ThreadContext implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'threadContext';
    public const ID = 'app.bsky.feed.defs';

    public ?string $rootAuthorLike;

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
        return [];
    }

    public static function new(?string $rootAuthorLike = null): self
    {
        $instance = new self();
        if ($rootAuthorLike !== null) {
            $instance->rootAuthorLike = $rootAuthorLike;
        }

        return $instance;
    }
}
