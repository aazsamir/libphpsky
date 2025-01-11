<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs;

/**
 * object
 */
class GeneratorView implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'generatorView';
    public const ID = 'app.bsky.feed.defs';

    public string $uri;
    public string $cid;
    public string $did;
    public ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ProfileView $creator = null;
    public string $displayName;
    public ?string $description = null;

    /** @var array<\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Richtext\Facet\Facet>|null */
    public ?array $descriptionFacets = [];
    public ?string $avatar = null;
    public ?int $likeCount = null;
    public ?bool $acceptsInteractions = null;

    /** @var array<\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs\Label>|null */
    public ?array $labels = [];
    public ?GeneratorViewerState $viewer = null;
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
        string $did,
        string $displayName,
        string $indexedAt,
        ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ProfileView $creator = null,
        ?string $description = null,
        ?array $descriptionFacets = null,
        ?string $avatar = null,
        ?int $likeCount = null,
        ?bool $acceptsInteractions = null,
        ?array $labels = null,
        ?GeneratorViewerState $viewer = null,
    ): self {
        $instance = new self();
        $instance->uri = $uri;
        $instance->cid = $cid;
        $instance->did = $did;
        $instance->displayName = $displayName;
        $instance->indexedAt = $indexedAt;
        $instance->creator = $creator;
        $instance->description = $description;
        $instance->descriptionFacets = $descriptionFacets;
        $instance->avatar = $avatar;
        $instance->likeCount = $likeCount;
        $instance->acceptsInteractions = $acceptsInteractions;
        $instance->labels = $labels;
        $instance->viewer = $viewer;

        return $instance;
    }
}
