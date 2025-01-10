<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs;

/**
 * object
 */
class BlockedAuthor implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'blockedAuthor';
    public const ID = 'app.bsky.feed.defs';

    public string $did;
    public ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ViewerState $viewer = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        string $did,
        ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ViewerState $viewer = null,
    ): self {
        $instance = new self();
        $instance->did = $did;
        $instance->viewer = $viewer;

        return $instance;
    }
}
