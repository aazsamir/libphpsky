<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs;

/**
 * object
 */
class GeneratorViewerState implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'generatorViewerState';
    public const ID = 'app.bsky.feed.defs';

    public ?string $like = null;

    public static function id(): string
    {
        return self::ID;
    }
}
