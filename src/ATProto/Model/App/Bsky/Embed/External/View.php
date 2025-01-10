<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\External;

/**
 * object
 */
class View implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'view';
    public const ID = 'app.bsky.embed.external';

    public ?ViewExternal $external = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(?ViewExternal $external = null): self
    {
        $instance = new self();
        $instance->external = $external;

        return $instance;
    }
}
