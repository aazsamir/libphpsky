<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\Defs;

/**
 * object
 */
class StarterPackViewBasic implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'starterPackViewBasic';
    public const ID = 'app.bsky.graph.defs';

    public string $uri;
    public string $cid;
    public mixed $record;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileViewBasic $creator;
    public ?int $listItemCount;
    public ?int $joinedWeekCount;
    public ?int $joinedAllTimeCount;

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label>|null */
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
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label> $labels
     */
    public static function new(
        string $uri,
        string $cid,
        mixed $record,
        \DateTimeInterface $indexedAt,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileViewBasic $creator = null,
        ?int $listItemCount = null,
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
        if ($listItemCount !== null) {
            $instance->listItemCount = $listItemCount;
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
