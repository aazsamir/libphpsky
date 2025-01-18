<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs;

/**
 * object
 */
class PostView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'postView';
    public const ID = 'app.bsky.feed.defs';

    public string $uri;
    public string $cid;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileViewBasic $author;
    public mixed $record;

    /** @var \Aazsamir\Libphpsky\Model\App\Bsky\Embed\Images\View|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Video\View|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\External\View|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Record\View|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\RecordWithMedia\View|null */
    public mixed $embed;
    public ?int $replyCount;
    public ?int $repostCount;
    public ?int $likeCount;
    public ?int $quoteCount;
    public \DateTimeInterface $indexedAt;
    public ?ViewerState $viewer;

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label>|null */
    public ?array $labels = [];
    public ?ThreadgateView $threadgate;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label> $labels
     */
    public static function new(
        string $uri,
        string $cid,
        mixed $record,
        \DateTimeInterface $indexedAt,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileViewBasic $author = null,
        \Aazsamir\Libphpsky\Model\App\Bsky\Embed\Images\View|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Video\View|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\External\View|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Record\View|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\RecordWithMedia\View|null $embed = null,
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
