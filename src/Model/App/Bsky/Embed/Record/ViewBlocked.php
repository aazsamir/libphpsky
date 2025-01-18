<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Embed\Record;

/**
 * object
 */
class ViewBlocked implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'viewBlocked';
    public const ID = 'app.bsky.embed.record';

    public string $uri;
    public bool $blocked;
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
        return ['uri', 'blocked', 'author'];
    }

    public static function new(
        string $uri,
        bool $blocked,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\BlockedAuthor $author = null,
    ): self {
        $instance = new self();
        $instance->uri = $uri;
        $instance->blocked = $blocked;
        if ($author !== null) {
            $instance->author = $author;
        }

        return $instance;
    }
}
