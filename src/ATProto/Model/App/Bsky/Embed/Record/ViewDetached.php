<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Record;

/**
 * object
 */
class ViewDetached implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'viewDetached';
    public const ID = 'app.bsky.embed.record';

    public string $uri;
    public bool $detached;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $uri, bool $detached): self
    {
        $instance = new self();
        $instance->uri = $uri;
        $instance->detached = $detached;

        return $instance;
    }
}
