<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Record;

/**
 * object
 */
class ViewRecord implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'viewRecord';
    public const ID = 'app.bsky.embed.record';

    public string $uri;
    public string $cid;
    public ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ProfileViewBasic $author = null;
    public mixed $value;

    /** @var array<\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs\Label>|null */
    public ?array $labels = [];
    public ?int $replyCount = null;
    public ?int $repostCount = null;
    public ?int $likeCount = null;
    public ?int $quoteCount = null;

    /** @var array<\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Images\View|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Video\View|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\External\View|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Record\View|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\RecordWithMedia\View>|null */
    public ?array $embeds = [];
    public string $indexedAt;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs\Label> $labels
     * @param array<\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Images\View|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Video\View|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\External\View|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\Record\View|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Embed\RecordWithMedia\View> $embeds
     */
    public static function new(
        string $uri,
        string $cid,
        mixed $value,
        string $indexedAt,
        ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ProfileViewBasic $author = null,
        ?array $labels = null,
        ?int $replyCount = null,
        ?int $repostCount = null,
        ?int $likeCount = null,
        ?int $quoteCount = null,
        ?array $embeds = null,
    ): self {
        $instance = new self();
        $instance->uri = $uri;
        $instance->cid = $cid;
        $instance->value = $value;
        $instance->indexedAt = $indexedAt;
        $instance->author = $author;
        $instance->labels = $labels;
        $instance->replyCount = $replyCount;
        $instance->repostCount = $repostCount;
        $instance->likeCount = $likeCount;
        $instance->quoteCount = $quoteCount;
        $instance->embeds = $embeds;

        return $instance;
    }
}
