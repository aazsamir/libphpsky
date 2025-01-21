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

    /** @var ?array<\Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs\ListItemView> */
    public ?array $listItemsSample = [];

    /** @var ?array<\Aazsamir\Libphpsky\Model\App\Bsky\Feed\Defs\GeneratorView> */
    public ?array $feeds = [];
    public ?int $joinedWeekCount;
    public ?int $joinedAllTimeCount;

    /** @var ?array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label> */
    public ?array $labels = [];
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
        return ['uri', 'cid', 'record', 'creator', 'indexedAt'];
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
        if ($creator !== null) {
            $instance->creator = $creator;
        }
        if ($list !== null) {
            $instance->list = $list;
        }
        if ($listItemsSample !== null) {
            $instance->listItemsSample = $listItemsSample;
        }
        if ($feeds !== null) {
            $instance->feeds = $feeds;
        }
        if ($joinedWeekCount !== null) {
            $instance->joinedWeekCount = $joinedWeekCount;
        }
        if ($joinedAllTimeCount !== null) {
            $instance->joinedAllTimeCount = $joinedAllTimeCount;
        }
        if ($labels !== null) {
            $instance->labels = $labels;
        }

        return $instance;
    }
}
