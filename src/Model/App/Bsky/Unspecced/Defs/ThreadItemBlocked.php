<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs;

/**
 * object
 */
class ThreadItemBlocked implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'threadItemBlocked';
    public const ID = 'app.bsky.unspecced.defs';

    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\BlockedAuthor $author;

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
        return ['author'];
    }

    public static function new(?\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\BlockedAuthor $author = null): self
    {
        $instance = new self();
        if ($author !== null) {
            $instance->author = $author;
        }

        return $instance;
    }
}
