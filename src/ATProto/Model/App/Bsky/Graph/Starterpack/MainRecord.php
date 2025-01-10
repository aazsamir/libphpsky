<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\Starterpack;

/**
 * object
 */
class MainRecord implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'mainRecord';
    public const ID = 'app.bsky.graph.starterpack';

    public string $name;
    public ?string $description = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Richtext\Facet\Facet[] */
    public ?array $descriptionFacets = [];
    public string $list;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\Starterpack\FeedItem[] */
    public ?array $feeds = [];
    public string $createdAt;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Richtext\Facet\Facet[] $descriptionFacets
     * @param \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\Starterpack\FeedItem[] $feeds
     */
    public static function new(
        string $name,
        string $list,
        string $createdAt,
        ?string $description = null,
        ?array $descriptionFacets = null,
        ?array $feeds = null,
    ): self {
        $instance = new self();
        $instance->name = $name;
        $instance->list = $list;
        $instance->createdAt = $createdAt;
        $instance->description = $description;
        $instance->descriptionFacets = $descriptionFacets;
        $instance->feeds = $feeds;

        return $instance;
    }
}
