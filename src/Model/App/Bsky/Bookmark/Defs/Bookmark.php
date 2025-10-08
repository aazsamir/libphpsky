<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Bookmark\Defs;

/**
 * Object used to store bookmark data in stash.
 * object
 */
class Bookmark implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'bookmark';
    public const ID = 'app.bsky.bookmark.defs';

    /** @var ?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef A strong ref to the record to be bookmarked. Currently, only `app.bsky.feed.post` records are supported. */
    public ?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef $subject;

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
        return ['subject'];
    }

    public static function new(?\Aazsamir\Libphpsky\Model\Com\Atproto\Repo\StrongRef\StrongRef $subject = null): self
    {
        $instance = new self();
        if ($subject !== null) {
            $instance->subject = $subject;
        }

        return $instance;
    }
}
