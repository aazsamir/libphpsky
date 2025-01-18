<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs;

/**
 * object
 */
class GeneratorView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'generatorView';
    public const ID = 'app.bsky.feed.defs';

    public string $uri;
    public string $cid;
    public string $did;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileView $creator;
    public string $displayName;
    public ?string $description;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet\Facet>|null */
    public ?array $descriptionFacets = [];
    public ?string $avatar;
    public ?int $likeCount;
    public ?bool $acceptsInteractions;

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label>|null */
    public ?array $labels = [];
    public ?GeneratorViewerState $viewer;
    public ?string $contentMode;
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
        return ['uri', 'cid', 'did', 'creator', 'displayName', 'indexedAt'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet\Facet> $descriptionFacets
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label> $labels
     */
    public static function new(
        string $uri,
        string $cid,
        string $did,
        string $displayName,
        \DateTimeInterface $indexedAt,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileView $creator = null,
        ?string $description = null,
        ?array $descriptionFacets = [],
        ?string $avatar = null,
        ?int $likeCount = null,
        ?bool $acceptsInteractions = null,
        ?array $labels = [],
        ?GeneratorViewerState $viewer = null,
        ?string $contentMode = null,
    ): self {
        $instance = new self();
        $instance->uri = $uri;
        $instance->cid = $cid;
        $instance->did = $did;
        $instance->displayName = $displayName;
        $instance->indexedAt = $indexedAt;
        if ($creator !== null) {
            $instance->creator = $creator;
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
        if ($likeCount !== null) {
            $instance->likeCount = $likeCount;
        }
        if ($acceptsInteractions !== null) {
            $instance->acceptsInteractions = $acceptsInteractions;
        }
        if ($labels !== null) {
            $instance->labels = $labels;
        }
        if ($viewer !== null) {
            $instance->viewer = $viewer;
        }
        if ($contentMode !== null) {
            $instance->contentMode = $contentMode;
        }

        return $instance;
    }
}
