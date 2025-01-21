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

    /** @var ?array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label> */
    public ?array $labels = [];
    public ?ThreadgateView $threadgate;

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public static function nullable(): array
    {
        return [];
    }

    public static function required(): array
    {
        return ['uri', 'cid', 'author', 'record', 'indexedAt'];
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
        ?array $labels = [],
        ?ThreadgateView $threadgate = null,
    ): self {
        $instance = new self();
        $instance->uri = $uri;
        $instance->cid = $cid;
        $instance->record = $record;
        $instance->indexedAt = $indexedAt;
        if ($author !== null) {
            $instance->author = $author;
        }
        if ($embed !== null) {
            $instance->embed = $embed;
        }
        if ($replyCount !== null) {
            $instance->replyCount = $replyCount;
        }
        if ($repostCount !== null) {
            $instance->repostCount = $repostCount;
        }
        if ($likeCount !== null) {
            $instance->likeCount = $likeCount;
        }
        if ($quoteCount !== null) {
            $instance->quoteCount = $quoteCount;
        }
        if ($viewer !== null) {
            $instance->viewer = $viewer;
        }
        if ($labels !== null) {
            $instance->labels = $labels;
        }
        if ($threadgate !== null) {
            $instance->threadgate = $threadgate;
        }

        return $instance;
    }
}
