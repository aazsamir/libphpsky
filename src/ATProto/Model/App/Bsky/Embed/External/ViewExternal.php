<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\External;

/**
 * object
 */
class ViewExternal implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'viewExternal';
    public const ID = 'app.bsky.embed.external';

    public string $uri;
    public string $title;
    public string $description;
    public ?string $thumb = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $uri, string $title, string $description, ?string $thumb = null): self
    {
        $instance = new self();
        $instance->uri = $uri;
        $instance->title = $title;
        $instance->description = $description;
        $instance->thumb = $thumb;

        return $instance;
    }
}
