<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Post;

/**
 * object
 */
class TextSlice implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'textSlice';
    public const ID = 'app.bsky.feed.post';

    public int $start;
    public int $end;

    public static function id(): string
    {
        return self::ID;
    }
}
