<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs;

/**
 * object
 */
class FeedViewPost implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'feedViewPost';
    public const ID = 'app.bsky.feed.defs';

    public ?PostView $post = null;
    public ?ReplyRef $reply = null;
    public mixed $reason = null;
    public ?string $feedContext = null;

    public static function id(): string
    {
        return self::ID;
    }
}
