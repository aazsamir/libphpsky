<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs;

/**
 * object
 */
class PostView implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'postView';
    public const ID = 'app.bsky.feed.defs';

    public string $uri;
    public string $cid;
    public ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ProfileViewBasic $author = null;
    public mixed $record;
    public mixed $embed = null;
    public ?int $replyCount = null;
    public ?int $repostCount = null;
    public ?int $likeCount = null;
    public ?int $quoteCount = null;
    public string $indexedAt;
    public ?ViewerState $viewer = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs\Label[] */
    public ?array $labels = [];
    public ?ThreadgateView $threadgate = null;

    public static function id(): string
    {
        return self::ID;
    }
}
