<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\Generator;

/**
 * object
 */
class Generator implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'main';
    public const ID = 'app.bsky.feed.generator';

    public string $did;
    public string $displayName;
    public ?string $description;

    /** @var ?array<\Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet\Facet> */
    public ?array $descriptionFacets = [];
    public ?string $avatar;

    /** @var ?bool Declaration that a feed accepts feedback interactions from a client through app.bsky.feed.sendInteractions */
    public ?bool $acceptsInteractions;

    /** @var \Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\SelfLabels|null Self-label values */
    public mixed $labels;
    public ?string $contentMode;
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
        return ['did', 'displayName', 'createdAt'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet\Facet> $descriptionFacets
     */
    public static function new(
        string $did,
        string $displayName,
        \DateTimeInterface $createdAt,
        ?string $description = null,
        ?array $descriptionFacets = [],
        ?string $avatar = null,
        ?bool $acceptsInteractions = null,
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\SelfLabels $labels = null,
        ?string $contentMode = null,
    ): self {
        $instance = new self();
        $instance->did = $did;
        $instance->displayName = $displayName;
        $instance->createdAt = $createdAt;
        if ($description !== null) {
            $instance->description = $description;
        }
        if ($descriptionFacets !== null) {
            $instance->descriptionFacets = $descriptionFacets;
        }
        if ($avatar !== null) {
            $instance->avatar = $avatar;
        }
        if ($acceptsInteractions !== null) {
            $instance->acceptsInteractions = $acceptsInteractions;
        }
        if ($labels !== null) {
            $instance->labels = $labels;
        }
        if ($contentMode !== null) {
            $instance->contentMode = $contentMode;
        }

        return $instance;
    }
}
