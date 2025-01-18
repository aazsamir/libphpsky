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

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet\Facet>|null */
    public ?array $descriptionFacets = [];
    public ?string $avatar;
    public ?bool $acceptsInteractions;

    /** @var \Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\SelfLabels|null */
    public mixed $labels;
    public ?string $contentMode;
    public \DateTimeInterface $createdAt;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet\Facet> $descriptionFacets
     */
    public static function new(
        string $did,
        string $displayName,
        \DateTimeInterface $createdAt,
        ?string $description = null,
        ?array $descriptionFacets = null,
        ?string $avatar = null,
        ?bool $acceptsInteractions = null,
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\SelfLabels $labels = null,
        ?string $contentMode = null,
    ): self {
        $instance = new self();
        $instance->did = $did;
        $instance->displayName = $displayName;
        $instance->createdAt = $createdAt;
        $instance->description = $description;
        $instance->descriptionFacets = $descriptionFacets;
        $instance->avatar = $avatar;
        $instance->acceptsInteractions = $acceptsInteractions;
        $instance->labels = $labels;
        $instance->contentMode = $contentMode;

        return $instance;
    }
}
