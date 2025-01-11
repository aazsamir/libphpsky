<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\Defs;

/**
 * object
 */
class StarterPackViewBasic implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'starterPackViewBasic';
    public const ID = 'app.bsky.graph.defs';

    public string $uri;
    public string $cid;
    public mixed $record;
    public ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ProfileViewBasic $creator = null;
    public ?int $listItemCount = null;
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
     * @param array<\Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs\Label> $labels
     */
    public static function new(
        string $uri,
        string $cid,
        mixed $record,
        string $indexedAt,
        ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ProfileViewBasic $creator = null,
        ?int $listItemCount = null,
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
        $instance->listItemCount = $listItemCount;
        $instance->joinedWeekCount = $joinedWeekCount;
        $instance->joinedAllTimeCount = $joinedAllTimeCount;
        $instance->labels = $labels;

        return $instance;
    }
}
