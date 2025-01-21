<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs;

/**
 * object
 */
class ListViewBasic implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'listViewBasic';
    public const ID = 'app.bsky.graph.defs';

    public string $uri;
    public string $cid;
    public string $name;
    public ?string $purpose;
    public ?string $avatar;
    public ?int $listItemCount;

    /** @var ?array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label> */
    public ?array $labels = [];
    public ?ListViewerState $viewer;
    public ?\DateTimeInterface $indexedAt;

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
        return ['uri', 'cid', 'name', 'purpose'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label> $labels
     */
    public static function new(
        string $uri,
        string $cid,
        string $name,
        ?string $purpose = null,
        ?string $avatar = null,
        ?int $listItemCount = null,
        ?array $labels = [],
        ?ListViewerState $viewer = null,
        ?\DateTimeInterface $indexedAt = null,
    ): self {
        $instance = new self();
        $instance->uri = $uri;
        $instance->cid = $cid;
        $instance->name = $name;
        if ($purpose !== null) {
            $instance->purpose = $purpose;
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
        if ($indexedAt !== null) {
            $instance->indexedAt = $indexedAt;
        }

        return $instance;
    }
}
