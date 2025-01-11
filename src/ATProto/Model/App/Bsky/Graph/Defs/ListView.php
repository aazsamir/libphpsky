<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\Defs;

/**
 * object
 */
class ListView implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'listView';
    public const ID = 'app.bsky.graph.defs';

    public string $uri;
    public string $cid;
    public ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ProfileView $creator = null;
    public string $name;
    public ?string $purpose = null;
    public ?string $description = null;

    /** @var array<\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Richtext\Facet\Facet>|null */
    public ?array $descriptionFacets = [];
    public ?string $avatar = null;
    public ?int $listItemCount = null;

    /** @var array<\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs\Label>|null */
    public ?array $labels = [];
    public ?ListViewerState $viewer = null;
    public string $indexedAt;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Richtext\Facet\Facet> $descriptionFacets
     * @param array<\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs\Label> $labels
     */
    public static function new(
        string $uri,
        string $cid,
        string $name,
        string $indexedAt,
        ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ProfileView $creator = null,
        ?string $purpose = null,
        ?string $description = null,
        ?array $descriptionFacets = null,
        ?string $avatar = null,
        ?int $listItemCount = null,
        ?array $labels = null,
        ?ListViewerState $viewer = null,
    ): self {
        $instance = new self();
        $instance->uri = $uri;
        $instance->cid = $cid;
        $instance->name = $name;
        $instance->indexedAt = $indexedAt;
        $instance->creator = $creator;
        $instance->purpose = $purpose;
        $instance->description = $description;
        $instance->descriptionFacets = $descriptionFacets;
        $instance->avatar = $avatar;
        $instance->listItemCount = $listItemCount;
        $instance->labels = $labels;
        $instance->viewer = $viewer;

        return $instance;
    }
}
