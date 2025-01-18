<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs;

/**
 * object
 */
class StarterPackView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'starterPackView';
    public const ID = 'app.bsky.graph.defs';

    public string $uri;
    public string $cid;
    public mixed $record;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileViewBasic $creator;
    public ?ListViewBasic $list;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\ListItemView>|null */
    public ?array $listItemsSample = [];

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\GeneratorView>|null */
    public ?array $feeds = [];
    public ?int $joinedWeekCount;
    public ?int $joinedAllTimeCount;

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label>|null */
    public ?array $labels = [];
    public \DateTimeInterface $indexedAt;

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\ListItemView> $listItemsSample
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\GeneratorView> $feeds
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label> $labels
     */
    public static function new(
        string $uri,
        string $cid,
        mixed $record,
        \DateTimeInterface $indexedAt,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileViewBasic $creator = null,
        ?ListViewBasic $list = null,
        ?array $listItemsSample = [],
        ?array $feeds = [],
        ?int $joinedWeekCount = null,
        ?int $joinedAllTimeCount = null,
        ?array $labels = [],
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
