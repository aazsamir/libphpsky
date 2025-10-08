<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetPostThreadV2;

/**
 * object
 */
class ThreadItem implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'threadItem';
    public const ID = 'app.bsky.unspecced.getPostThreadV2';

    public string $uri;

    /** @var int The nesting level of this item in the thread. Depth 0 means the anchor item. Items above have negative depths, items below have positive depths. */
    public int $depth;

    /** @var \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs\ThreadItemPost|\Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs\ThreadItemNoUnauthenticated|\Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs\ThreadItemNotFound|\Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs\ThreadItemBlocked */
    public mixed $value;

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
        return ['uri', 'depth', 'value'];
    }

    public static function new(
        string $uri,
        int $depth,
        \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs\ThreadItemPost|\Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs\ThreadItemNoUnauthenticated|\Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs\ThreadItemNotFound|\Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs\ThreadItemBlocked $value,
    ): self {
        $instance = new self();
        $instance->uri = $uri;
        $instance->depth = $depth;
        $instance->value = $value;

        return $instance;
    }
}
