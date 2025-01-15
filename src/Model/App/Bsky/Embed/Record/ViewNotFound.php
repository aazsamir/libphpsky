<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Embed\Record;

/**
 * object
 */
class ViewNotFound implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'viewNotFound';
    public const ID = 'app.bsky.embed.record';

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
