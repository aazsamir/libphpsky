<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs;

/**
 * object
 */
class ListViewBasic implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'listViewBasic';
    public const ID = 'app.bsky.graph.defs';

    public string $uri;
    public string $cid;
    public string $name;
    public ?string $purpose = null;
    public ?string $avatar = null;
    public ?int $listItemCount = null;

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label>|null */
    public ?array $labels = [];
    public ?ListViewerState $viewer = null;
    public ?\DateTimeInterface $indexedAt = null;

    public static function id(): string
    {
        return self::ID;
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
        ?array $labels = null,
        ?ListViewerState $viewer = null,
        ?\DateTimeInterface $indexedAt = null,
    ): self {
        $instance = new self();
        $instance->uri = $uri;
        $instance->cid = $cid;
        $instance->name = $name;
        $instance->purpose = $purpose;
        $instance->avatar = $avatar;
        $instance->listItemCount = $listItemCount;
        $instance->labels = $labels;
        $instance->viewer = $viewer;
        $instance->indexedAt = $indexedAt;

        return $instance;
    }
}