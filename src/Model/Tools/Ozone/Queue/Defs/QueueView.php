<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\Defs;

/**
 * object
 */
class QueueView implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'queueView';
    public const ID = 'tools.ozone.queue.defs';

    /** @var int Queue ID */
    public int $id;

    /** @var string Display name of the queue */
    public string $name;

    /** @var ?array<string> Subject types this queue accepts. */
    public ?array $subjectTypes = [];

    /** @var ?string Collection name for record subjects. Omit to accept every collection. */
    public ?string $collection;

    /** @var ?array<string> Report reason types this queue accepts (fully qualified NSIDs) */
    public ?array $reportTypes = [];

    /** @var ?array<string> Match any listed tag on the account submitting the report. */
    public ?array $reporterTags = [];

    /** @var ?array<string> Match tags on the account that is being reported against. For record subjects, use the author account. Match any listed tag. */
    public ?array $accountTags = [];

    /** @var ?string Optional description of the queue */
    public ?string $description;

    /** @var ?array<string> Policy keys recommended when actioning reports in this queue */
    public ?array $recommendedPolicies = [];

    /** @var ?array<string> Labels recommended for this queue and used as a fallback when routing label appeals */
    public ?array $recommendedLabels = [];

    /** @var string DID of moderator who created this queue */
    public string $createdBy;
    public \DateTimeInterface $createdAt;
    public \DateTimeInterface $updatedAt;

    /** @var bool Whether this queue is currently active */
    public bool $enabled;

    /** @var ?\DateTimeInterface When the queue was deleted, if applicable */
    public ?\DateTimeInterface $deletedAt;

    /** @var ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\Defs\QueueStats Statistics about this queue */
    public ?QueueStats $stats;

    /** @var ?bool Admins can always list this queue and browse its reports. Other roles require an active queue assignment. Individual report and moderation event access is unchanged. */
    public ?bool $strictAccess;

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
        return ['id', 'name', 'createdBy', 'createdAt', 'updatedAt', 'enabled', 'stats'];
    }

    /**
     * @param array<string> $subjectTypes
     * @param array<string> $reportTypes
     * @param array<string> $reporterTags
     * @param array<string> $accountTags
     * @param array<string> $recommendedPolicies
     * @param array<string> $recommendedLabels
     */
    public static function new(
        int $id,
        string $name,
        string $createdBy,
        \DateTimeInterface $createdAt,
        \DateTimeInterface $updatedAt,
        bool $enabled,
        ?array $subjectTypes = [],
        ?string $collection = null,
        ?array $reportTypes = [],
        ?array $reporterTags = [],
        ?array $accountTags = [],
        ?string $description = null,
        ?array $recommendedPolicies = [],
        ?array $recommendedLabels = [],
        ?\DateTimeInterface $deletedAt = null,
        ?QueueStats $stats = null,
        ?bool $strictAccess = null,
    ): self {
        $instance = new self();
        $instance->id = $id;
        $instance->name = $name;
        $instance->createdBy = $createdBy;
        $instance->createdAt = $createdAt;
        $instance->updatedAt = $updatedAt;
        $instance->enabled = $enabled;
        if ($subjectTypes !== null) {
            $instance->subjectTypes = $subjectTypes;
        }
        if ($collection !== null) {
            $instance->collection = $collection;
        }
        if ($reportTypes !== null) {
            $instance->reportTypes = $reportTypes;
        }
        if ($reporterTags !== null) {
            $instance->reporterTags = $reporterTags;
        }
        if ($accountTags !== null) {
            $instance->accountTags = $accountTags;
        }
        if ($description !== null) {
            $instance->description = $description;
        }
        if ($recommendedPolicies !== null) {
            $instance->recommendedPolicies = $recommendedPolicies;
        }
        if ($recommendedLabels !== null) {
            $instance->recommendedLabels = $recommendedLabels;
        }
        if ($deletedAt !== null) {
            $instance->deletedAt = $deletedAt;
        }
        if ($stats !== null) {
            $instance->stats = $stats;
        }
        if ($strictAccess !== null) {
            $instance->strictAccess = $strictAccess;
        }

        return $instance;
    }
}
