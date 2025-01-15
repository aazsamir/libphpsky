<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs;

/**
 * object
 */
class GeneratorViewerState implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'generatorViewerState';
    public const ID = 'app.bsky.feed.defs';

    public ?string $like = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(?string $like = null): self
    {
        $instance = new self();
        $instance->like = $like;

        return $instance;
    }
}