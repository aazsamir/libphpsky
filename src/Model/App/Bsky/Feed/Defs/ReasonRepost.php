<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs;

/**
 * object
 */
class ReasonRepost implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'reasonRepost';
    public const ID = 'app.bsky.feed.defs';

    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileViewBasic $by;
    public ?string $uri;
    public ?string $cid;
    public \DateTimeInterface $indexedAt;

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
        return ['by', 'indexedAt'];
    }

    public static function new(
        \DateTimeInterface $indexedAt,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileViewBasic $by = null,
        ?string $uri = null,
        ?string $cid = null,
    ): self {
        $instance = new self();
        $instance->indexedAt = $indexedAt;
        if ($by !== null) {
            $instance->by = $by;
        }
        if ($uri !== null) {
            $instance->uri = $uri;
        }
        if ($cid !== null) {
            $instance->cid = $cid;
        }

        return $instance;
    }
}
