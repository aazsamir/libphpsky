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

    /** @var ?array<string> The set of report reason 'codes' which are in-scope for this service to review and action. These usually align to policy categories. If not defined (distinct from empty array), all reason types are allowed. */
    public ?array $reasonTypes = [];

    /** @var ?array<string> The set of subject types (account, record, etc) this service accepts reports on. */
    public ?array $subjectTypes = [];

    /** @var ?array<string> Set of record types (collection NSIDs) which can be reported to this service. If not defined (distinct from empty array), default is any record type. */
    public ?array $subjectCollections = [];

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
     * @param array<string> $reasonTypes
     * @param array<string> $subjectTypes
     * @param array<string> $subjectCollections
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
        ?array $reasonTypes = [],
        ?array $subjectTypes = [],
        ?array $subjectCollections = [],
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
        if ($reasonTypes !== null) {
            $instance->reasonTypes = $reasonTypes;
        }
        if ($subjectTypes !== null) {
            $instance->subjectTypes = $subjectTypes;
        }
        if ($subjectCollections !== null) {
            $instance->subjectCollections = $subjectCollections;
        }

        return $instance;
    }
}
