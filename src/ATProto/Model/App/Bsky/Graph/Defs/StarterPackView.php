<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\Defs;

/**
 * object
 */
class StarterPackView implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'starterPackView';
    public const ID = 'app.bsky.graph.defs';

    public string $uri;
    public string $cid;
    public mixed $record;
    public ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ProfileViewBasic $creator = null;
    public ?ListViewBasic $list = null;

    /** @var array<\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\Defs\ListItemView>|null */
    public ?array $listItemsSample = [];

    /** @var array<\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs\GeneratorView>|null */
    public ?array $feeds = [];
    public ?int $joinedWeekCount = null;
    public ?int $joinedAllTimeCount = null;

    /** @var array<\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs\Label>|null */
    public ?array $labels = [];
    public string $indexedAt;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\Defs\ListItemView> $listItemsSample
     * @param array<\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\Defs\GeneratorView> $feeds
     * @param array<\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs\Label> $labels
     */
    public static function new(
        string $uri,
        string $cid,
        mixed $record,
        string $indexedAt,
        ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ProfileViewBasic $creator = null,
        ?ListViewBasic $list = null,
        ?array $listItemsSample = null,
        ?array $feeds = null,
        ?int $joinedWeekCount = null,
        ?int $joinedAllTimeCount = null,
        ?array $labels = null,
    ): self {
        $instance = new self();
        $instance->uri = $uri;
        $instance->cid = $cid;
        $instance->record = $record;
        $instance->indexedAt = $indexedAt;
        $instance->creator = $creator;
        $instance->list = $list;
        $instance->listItemsSample = $listItemsSample;
        $instance->feeds = $feeds;
        $instance->joinedWeekCount = $joinedWeekCount;
        $instance->joinedAllTimeCount = $joinedAllTimeCount;
        $instance->labels = $labels;

        return $instance;
    }
}
