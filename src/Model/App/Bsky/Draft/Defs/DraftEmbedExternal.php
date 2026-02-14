<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Draft\Defs;

/**
 * object
 */
class DraftEmbedExternal implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'draftEmbedExternal';
    public const ID = 'app.bsky.draft.defs';

    public string $uri;

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
        return ['uri'];
    }

    public static function new(string $uri): self
    {
        $instance = new self();
        $instance->uri = $uri;

        return $instance;
    }
}
