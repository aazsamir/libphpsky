<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\Post;

/**
 * object
 */
class Post implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'main';
    public const ID = 'app.bsky.feed.post';

    /** @var string The primary post content. May be an empty string, if there are embeds. */
    public string $text;

    /** @var ?array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Post\Entity> DEPRECATED: replaced by app.bsky.richtext.facet. */
    public ?array $entities = [];

    /** @var ?array<\Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet\Facet> Annotations of text (mentions, URLs, hashtags, etc) */
    public ?array $facets = [];
    public ?ReplyRef $reply;

    /** @var \Aazsamir\Libphpsky\Model\App\Bsky\Embed\Images\Images|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Video\Video|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\External\External|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Record\Record|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\RecordWithMedia\RecordWithMedia|null */
    public mixed $embed;

    /** @var ?array<string> Indicates human language of post primary text content. */
    public ?array $langs = [];

    /** @var \Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\SelfLabels|null Self-label values for this post. Effectively content warnings. */
    public mixed $labels;

    /** @var ?array<string> Additional hashtags, in addition to any included in post text and facets. */
    public ?array $tags = [];

    /** @var \DateTimeInterface Client-declared timestamp when this post was originally created. */
    public \DateTimeInterface $createdAt;

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
        return ['text', 'createdAt'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Post\Entity> $entities
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet\Facet> $facets
     * @param array<string> $langs
     * @param array<string> $tags
     */
    public static function new(
        string $text,
        \DateTimeInterface $createdAt,
        ?array $entities = [],
        ?array $facets = [],
        ?ReplyRef $reply = null,
        \Aazsamir\Libphpsky\Model\App\Bsky\Embed\Images\Images|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Video\Video|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\External\External|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Record\Record|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\RecordWithMedia\RecordWithMedia|null $embed = null,
        ?array $langs = [],
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\SelfLabels $labels = null,
        ?array $tags = [],
    ): self {
        $instance = new self();
        $instance->text = $text;
        $instance->createdAt = $createdAt;
        if ($entities !== null) {
            $instance->entities = $entities;
        }
        if ($facets !== null) {
            $instance->facets = $facets;
        }
        if ($reply !== null) {
            $instance->reply = $reply;
        }
        if ($embed !== null) {
            $instance->embed = $embed;
        }
        if ($langs !== null) {
            $instance->langs = $langs;
        }
        if ($labels !== null) {
            $instance->labels = $labels;
        }
        if ($tags !== null) {
            $instance->tags = $tags;
        }

        return $instance;
    }
}
