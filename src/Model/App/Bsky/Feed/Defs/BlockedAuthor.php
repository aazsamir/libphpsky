<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs;

/**
 * object
 */
class BlockedAuthor implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'blockedAuthor';
    public const ID = 'app.bsky.feed.defs';

    public string $did;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ViewerState $viewer;

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
        return ['did'];
    }

    public static function new(
        string $did,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ViewerState $viewer = null,
    ): self {
        $instance = new self();
        $instance->did = $did;
        if ($viewer !== null) {
            $instance->viewer = $viewer;
        }

        return $instance;
    }
}
