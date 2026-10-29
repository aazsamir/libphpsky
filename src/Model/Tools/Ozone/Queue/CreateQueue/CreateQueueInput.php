<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\CreateQueue;

/**
 * object
 */
class CreateQueueInput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'tools.ozone.queue.createQueue';

    /** @var string Display name for the queue (must be unique) */
    public string $name;

    /** @var ?array<string> Subject types this queue accepts */
    public ?array $subjectTypes = [];

    /** @var ?string Collection name for record subjects. Omit to accept every collection. */
    public ?string $collection;

    /** @var ?array<string> Report reason types (fully qualified NSIDs) */
    public ?array $reportTypes = [];

    /** @var ?array<string> Match any listed tag on the account submitting the report. */
    public ?array $reporterTags = [];

    /** @var ?array<string> Match any of these tags on the account that is being reported against. */
    public ?array $accountTags = [];

    /** @var ?string Optional description of the queue */
    public ?string $description;

    /** @var ?array<string> Policy keys to recommend when actioning reports in this queue */
    public ?array $recommendedPolicies = [];

    /** @var ?array<string> Labels to recommend for this queue and use as fallback appeal routing mappings */
    public ?array $recommendedLabels = [];

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
        return ['name'];
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
        string $name,
        ?array $subjectTypes = [],
        ?string $collection = null,
        ?array $reportTypes = [],
        ?array $reporterTags = [],
        ?array $accountTags = [],
        ?string $description = null,
        ?array $recommendedPolicies = [],
        ?array $recommendedLabels = [],
        ?bool $strictAccess = null,
    ): self {
        $instance = new self();
        $instance->name = $name;
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
        if ($strictAccess !== null) {
            $instance->strictAccess = $strictAccess;
        }

        return $instance;
    }
}
