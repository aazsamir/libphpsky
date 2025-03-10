<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Embed\Record;

/**
 * object
 */
class ViewDetached implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'viewDetached';
    public const ID = 'app.bsky.embed.record';

    public string $uri;
    public bool $detached;

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
        return ['uri', 'detached'];
    }

    public static function new(string $uri, bool $detached): self
    {
        $instance = new self();
        $instance->uri = $uri;
        $instance->detached = $detached;

        return $instance;
    }
}
