<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Embed\Record;

/**
 * object
 */
class ViewRecord implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'viewRecord';
    public const ID = 'app.bsky.embed.record';

    public string $uri;
    public string $cid;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileViewBasic $author;
    public mixed $value;

    /** @var ?array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label> */
    public ?array $labels = [];
    public ?int $replyCount;
    public ?int $repostCount;
    public ?int $likeCount;
    public ?int $quoteCount;

    /** @var ?array<\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Images\View|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Video\View|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\External\View|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Record\View|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\RecordWithMedia\View> */
    public ?array $embeds = [];
    public \DateTimeInterface $indexedAt;

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
        return ['uri', 'cid', 'author', 'value', 'indexedAt'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label> $labels
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Images\View|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Video\View|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\External\View|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Record\View|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\RecordWithMedia\View> $embeds
     */
    public static function new(
        string $uri,
        string $cid,
        mixed $value,
        \DateTimeInterface $indexedAt,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileViewBasic $author = null,
        ?array $labels = [],
        ?int $replyCount = null,
        ?int $repostCount = null,
        ?int $likeCount = null,
        ?int $quoteCount = null,
        ?array $embeds = [],
    ): self {
        $instance = new self();
        $instance->uri = $uri;
        $instance->cid = $cid;
        $instance->value = $value;
        $instance->indexedAt = $indexedAt;
        if ($author !== null) {
            $instance->author = $author;
        }
        if ($labels !== null) {
            $instance->labels = $labels;
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
        if ($embeds !== null) {
            $instance->embeds = $embeds;
        }

        return $instance;
    }
}
