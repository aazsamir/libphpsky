<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class FeedViewPref implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'feedViewPref';
    public const ID = 'app.bsky.actor.defs';

    public string $feed;
    public ?bool $hideReplies = null;
    public ?bool $hideRepliesByUnfollowed = null;
    public ?int $hideRepliesByLikeCount = null;
    public ?bool $hideReposts = null;
    public ?bool $hideQuotePosts = null;

    public static function id(): string
    {
        return self::ID;
    }
}
