<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Post;

/**
 * object
 */
class MainRecord implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'mainRecord';
    public const ID = 'app.bsky.feed.post';

    public string $text;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Post\Entity[] */
    public ?array $entities = [];

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Richtext\Facet\Facet[] */
    public ?array $facets = [];
    public ?ReplyRef $reply = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Post\Post|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Post\Post|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Post\Post|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Post\Post|\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Post\Post */
    public mixed $embed = null;

    /** @var string[] */
    public ?array $langs = [];

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs\SelfLabels */
    public mixed $labels = null;

    /** @var string[] */
    public ?array $tags = [];
    public string $createdAt;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Post\Entity[] $entities
     * @param \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Richtext\Facet\Facet[] $facets
     * @param string[] $langs
     * @param string[] $tags
     */
    public static function new(
        string $text,
        string $createdAt,
        ?array $entities = null,
        ?array $facets = null,
        ?ReplyRef $reply = null,
        mixed $embed = null,
        ?array $langs = null,
        mixed $labels = null,
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
