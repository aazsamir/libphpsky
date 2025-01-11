<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\List;

/**
 * object
 */
class MainRecord implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'mainRecord';
    public const ID = 'app.bsky.graph.list';

    public ?string $purpose = null;
    public string $name;
    public ?string $description = null;

    /** @var array<\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Richtext\Facet\Facet>|null */
    public ?array $descriptionFacets = [];
    public ?string $avatar = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs\SelfLabels|null */
    public mixed $labels = null;
    public string $createdAt;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Richtext\Facet\Facet> $descriptionFacets
     */
    public static function new(
        string $name,
        string $createdAt,
        ?string $purpose = null,
        ?string $description = null,
        ?array $descriptionFacets = null,
        ?string $avatar = null,
        ?\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs\SelfLabels $labels = null,
    ): self {
        $instance = new self();
        $instance->name = $name;
        $instance->createdAt = $createdAt;
        $instance->purpose = $purpose;
        $instance->description = $description;
        $instance->descriptionFacets = $descriptionFacets;
        $instance->avatar = $avatar;
        $instance->labels = $labels;

        return $instance;
    }
}
