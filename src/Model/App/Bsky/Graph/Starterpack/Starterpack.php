<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\Starterpack;

/**
 * object
 */
class Starterpack implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'main';
    public const ID = 'app.bsky.graph.starterpack';

    public string $name;
    public ?string $description;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet\Facet>|null */
    public ?array $descriptionFacets = [];
    public string $list;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Starterpack\FeedItem>|null */
    public ?array $feeds = [];
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
        return ['name', 'list', 'createdAt'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet\Facet> $descriptionFacets
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Starterpack\FeedItem> $feeds
     */
    public static function new(
        string $name,
        string $list,
        \DateTimeInterface $createdAt,
        ?string $description = null,
        ?array $descriptionFacets = [],
        ?array $feeds = [],
    ): self {
        $instance = new self();
        $instance->name = $name;
        $instance->list = $list;
        $instance->createdAt = $createdAt;
        if ($description !== null) {
            $instance->description = $description;
        }
        if ($descriptionFacets !== null) {
            $instance->descriptionFacets = $descriptionFacets;
        }
        if ($feeds !== null) {
            $instance->feeds = $feeds;
        }

        return $instance;
    }
}
