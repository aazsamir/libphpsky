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

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Images\View|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Video\View|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\External\View|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Record\View|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\RecordWithMedia\View */
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

    /**
     * @param \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs\Label[] $labels
     */
    public static function new(
        string $uri,
        string $cid,
        mixed $record,
        string $indexedAt,
        ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ProfileViewBasic $author = null,
        mixed $embed = null,
        ?int $replyCount = null,
        ?int $repostCount = null,
        ?int $likeCount = null,
        ?int $quoteCount = null,
        ?ViewerState $viewer = null,
        ?array $labels = null,
        ?ThreadgateView $threadgate = null,
    ): self {
        $instance = new self();
        $instance->uri = $uri;
        $instance->cid = $cid;
        $instance->record = $record;
        $instance->indexedAt = $indexedAt;
        $instance->author = $author;
        $instance->embed = $embed;
        $instance->replyCount = $replyCount;
        $instance->repostCount = $repostCount;
        $instance->likeCount = $likeCount;
        $instance->quoteCount = $quoteCount;
        $instance->viewer = $viewer;
        $instance->labels = $labels;
        $instance->threadgate = $threadgate;

        return $instance;
    }
}
