<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Labeler\Defs;

/**
 * object
 */
class LabelerViewDetailed implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'labelerViewDetailed';
    public const ID = 'app.bsky.labeler.defs';

    public string $uri;
    public string $cid;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileView $creator;
    public ?LabelerPolicies $policies;
    public ?int $likeCount;
    public ?LabelerViewerState $viewer;
    public \DateTimeInterface $indexedAt;

    /** @var ?array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label> */
    public ?array $labels = [];

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
        return ['uri', 'cid', 'creator', 'policies', 'indexedAt'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label> $labels
     */
    public static function new(
        string $uri,
        string $cid,
        \DateTimeInterface $indexedAt,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileView $creator = null,
        ?LabelerPolicies $policies = null,
        ?int $likeCount = null,
        ?LabelerViewerState $viewer = null,
        ?array $labels = [],
    ): self {
        $instance = new self();
        $instance->uri = $uri;
        $instance->cid = $cid;
        $instance->indexedAt = $indexedAt;
        if ($creator !== null) {
            $instance->creator = $creator;
        }
        if ($policies !== null) {
            $instance->policies = $policies;
        }
        if ($likeCount !== null) {
            $instance->likeCount = $likeCount;
        }
        if ($viewer !== null) {
            $instance->viewer = $viewer;
        }
        if ($labels !== null) {
            $instance->labels = $labels;
        }

        return $instance;
    }
}
