<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Labeler\Service;

/**
 * object
 */
class Service implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'main';
    public const ID = 'app.bsky.labeler.service';

    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Labeler\Defs\LabelerPolicies $policies;

    /** @var \Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\SelfLabels|null */
    public mixed $labels;
    public \DateTimeInterface $createdAt;

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
        return ['policies', 'createdAt'];
    }

    /**
     * @param array<string> $reasonTypes
     * @param array<string> $subjectTypes
     * @param array<string> $subjectCollections
     */
    public static function new(
        \DateTimeInterface $createdAt,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Labeler\Defs\LabelerPolicies $policies = null,
        ?\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\SelfLabels $labels = null,
        ?array $reasonTypes = [],
        ?array $subjectTypes = [],
        ?array $subjectCollections = [],
    ): self {
        $instance = new self();
        $instance->createdAt = $createdAt;
        if ($policies !== null) {
            $instance->policies = $policies;
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
