<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Embed\Record;

/**
 * object
 */
class ViewBlocked implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'viewBlocked';
    public const ID = 'app.bsky.embed.record';

    public string $uri;
    public bool $blocked;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\BlockedAuthor $author = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        string $uri,
        bool $blocked,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\BlockedAuthor $author = null,
    ): self {
        $instance = new self();
        $instance->uri = $uri;
        $instance->blocked = $blocked;
        $instance->author = $author;

        return $instance;
    }
}
