<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\List;

/**
 * object
 */
class ListDef implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'main';
    public const ID = 'app.bsky.graph.list';

    /** @var ?string Defines the purpose of the list (aka, moderation-oriented or curration-oriented) */
    public ?string $purpose;

    /** @var string Display name for list; can not be empty. */
    public string $name;
    public ?string $description;

    /** @var ?array<\Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet\Facet> */
    public ?array $descriptionFacets = [];
    public ?string $avatar;

    /** @var \Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\SelfLabels|null */
    public mixed $labels;
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
        return ['name', 'purpose', 'createdAt'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Richtext\Facet\Facet> $descriptionFacets
     */
    public static function new(
        string $name,
        \DateTimeInterface $createdAt,
        ?string $purpose = null,
        ?string $description = null,
        ?array $descriptionFacets = [],
        ?string $avatar = null,
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\SelfLabels $labels = null,
    ): self {
        $instance = new self();
        $instance->name = $name;
        $instance->createdAt = $createdAt;
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
        if ($labels !== null) {
            $instance->labels = $labels;
        }

        return $instance;
    }
}
