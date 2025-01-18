<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs;

/**
 * object
 */
class GeneratorViewerState implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'generatorViewerState';
    public const ID = 'app.bsky.feed.defs';

    public ?string $like;

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
