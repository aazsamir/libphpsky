<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs;

/**
 * object
 */
class NotFoundPost implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'notFoundPost';
    public const ID = 'app.bsky.feed.defs';

    public string $uri;
    public bool $notFound;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $uri, bool $notFound): self
    {
        $instance = new self();
        $instance->uri = $uri;
        $instance->notFound = $notFound;

        return $instance;
    }
}
