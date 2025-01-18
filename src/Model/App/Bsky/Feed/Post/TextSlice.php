<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\Post;

/**
 * object
 */
class TextSlice implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'textSlice';
    public const ID = 'app.bsky.feed.post';

    public int $start;
    public int $end;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(int $start, int $end): self
    {
        $instance = new self();
        $instance->start = $start;
        $instance->end = $end;

        return $instance;
    }
}
