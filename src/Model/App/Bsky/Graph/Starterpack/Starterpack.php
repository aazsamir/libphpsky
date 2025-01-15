<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\Starterpack;

/**
 * object
 */
class Starterpack implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'main';
    public const ID = 'app.bsky.graph.starterpack';

    public string $name;
    public ?string $description = null;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet\Facet>|null */
    public ?array $descriptionFacets = [];
    public string $list;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Starterpack\FeedItem>|null */
    public ?array $feeds = [];
    public string $createdAt;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet\Facet> $descriptionFacets
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Starterpack\FeedItem> $feeds
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
