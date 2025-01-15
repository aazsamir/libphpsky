<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\Post;

/**
 * object
 */
class Post implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'main';
    public const ID = 'app.bsky.feed.post';

    public string $text;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Post\Entity>|null */
    public ?array $entities = [];

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet\Facet>|null */
    public ?array $facets = [];
    public ?ReplyRef $reply = null;

    /** @var \Aazsamir\Libphpsky\Model\App\Bsky\Embed\Images\Images|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Video\Video|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\External\External|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Record\Record|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\RecordWithMedia\RecordWithMedia|null */
    public mixed $embed = null;

    /** @var array<string>|null */
    public ?array $langs = [];

    /** @var \Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\SelfLabels|null */
    public mixed $labels = null;

    /** @var array<string>|null */
    public ?array $tags = [];
    public string $createdAt;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Post\Entity> $entities
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet\Facet> $facets
     * @param array<string> $langs
     * @param array<string> $tags
     */
    public static function new(
        string $text,
        string $createdAt,
        ?array $entities = null,
        ?array $facets = null,
        ?ReplyRef $reply = null,
        \Aazsamir\Libphpsky\Model\App\Bsky\Embed\Images\Images|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Video\Video|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\External\External|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\Record\Record|\Aazsamir\Libphpsky\Model\App\Bsky\Embed\RecordWithMedia\RecordWithMedia|null $embed = null,
        ?array $langs = null,
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\SelfLabels $labels = null,
        ?array $tags = null,
    ): self {
        $instance = new self();
        $instance->text = $text;
        $instance->createdAt = $createdAt;
        $instance->entities = $entities;
        $instance->facets = $facets;
        $instance->reply = $reply;
        $instance->embed = $embed;
        $instance->langs = $langs;
        $instance->labels = $labels;
        $instance->tags = $tags;

        return $instance;
    }
}
