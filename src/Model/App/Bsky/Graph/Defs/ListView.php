<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs;

/**
 * object
 */
class ListView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'listView';
    public const ID = 'app.bsky.graph.defs';

    public string $uri;
    public string $cid;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileView $creator;
    public string $name;
    public ?string $purpose;
    public ?string $description;

    /** @var ?array<\Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet\Facet> */
    public ?array $descriptionFacets = [];
    public ?string $avatar;
    public ?int $listItemCount;

    /** @var ?array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label> */
    public ?array $labels = [];
    public ?ListViewerState $viewer;
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
        return ['uri', 'cid', 'creator', 'name', 'purpose', 'indexedAt'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet\Facet> $descriptionFacets
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label> $labels
     */
    public static function new(
        string $uri,
        string $cid,
        string $name,
        \DateTimeInterface $indexedAt,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileView $creator = null,
        ?string $purpose = null,
        ?string $description = null,
        ?array $descriptionFacets = [],
        ?string $avatar = null,
        ?int $listItemCount = null,
        ?array $labels = [],
        ?ListViewerState $viewer = null,
    ): self {
        $instance = new self();
        $instance->uri = $uri;
        $instance->cid = $cid;
        $instance->name = $name;
        $instance->indexedAt = $indexedAt;
        if ($creator !== null) {
            $instance->creator = $creator;
        }
        if ($purpose !== null) {
            $instance->purpose = $purpose;
        }
        if ($description !== null) {
            $instance->description = $description;
        }
        if ($descriptionFacets !== null) {
            $instance->descriptionFacets = $descriptionFacets;
        }
        if ($avatar !== null) {
            $instance->avatar = $avatar;
        }
        if ($listItemCount !== null) {
            $instance->listItemCount = $listItemCount;
        }
        if ($labels !== null) {
            $instance->labels = $labels;
        }
        if ($viewer !== null) {
            $instance->viewer = $viewer;
        }

        return $instance;
    }
}
