<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Bookmark\GetBookmarks;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.bookmark.getBookmarks';

    public ?string $cursor;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Bookmark\Defs\BookmarkView> */
    public array $bookmarks = [];

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
        return ['bookmarks'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Bookmark\Defs\BookmarkView> $bookmarks
     */
    public static function new(array $bookmarks, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->bookmarks = $bookmarks;
        if ($cursor !== null) {
            $instance->cursor = $cursor;
        }

        return $instance;
    }
}
