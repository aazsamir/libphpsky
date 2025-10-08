<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Bookmark\Defs;

/**
 * object
 */
class BookmarkView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'bookmarkView';
    public const ID = 'app.bsky.bookmark.defs';

    /** @var ?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef A strong ref to the bookmarked record. */
    public ?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef $subject;
    public ?\DateTimeInterface $createdAt;

    /** @var \Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\BlockedPost|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\NotFoundPost|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\PostView */
    public mixed $item;

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
        return ['subject', 'item'];
    }

    public static function new(
        \Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\BlockedPost|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\NotFoundPost|\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\PostView $item,
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef $subject = null,
        ?\DateTimeInterface $createdAt = null,
    ): self {
        $instance = new self();
        $instance->item = $item;
        if ($subject !== null) {
            $instance->subject = $subject;
        }
        if ($createdAt !== null) {
            $instance->createdAt = $createdAt;
        }

        return $instance;
    }
}
