<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs;

/**
 * object
 */
class ThreadViewPost implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'threadViewPost';
    public const ID = 'app.bsky.feed.defs';

    public ?PostView $post = null;
    public mixed $parent = null;

    /** @var mixed[] */
    public ?array $replies = [];

    public static function id(): string
    {
        return self::ID;
    }
}
