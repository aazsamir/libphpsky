<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs;

/**
 * object
 */
class ReasonRepost implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'reasonRepost';
    public const ID = 'app.bsky.feed.defs';

    public ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ProfileViewBasic $by = null;
    public string $indexedAt;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        string $indexedAt,
        ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ProfileViewBasic $by = null,
    ): self {
        $instance = new self();
        $instance->indexedAt = $indexedAt;
        $instance->by = $by;

        return $instance;
    }
}
