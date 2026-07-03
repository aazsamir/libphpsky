<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Report\QueryActivities;

/**
 * Query report activities across all reports, ordered by createdAt. Used by downstream pollers; for per-report activity history use listActivities.
 * query
 */
class QueryActivities implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.report.queryActivities';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param ?array<string> $activityTypes  Filter to specific activity types (e.g. closeActivity, escalationActivity). If omitted, all types are returned.
     * @param ?\DateTimeInterface $createdAfter Retrieve activities created at or after a given timestamp
     * @param ?\DateTimeInterface $createdBefore Retrieve activities created at or before a given timestamp
     * @param ?string $cursor Cursor of the form `<createdAtMs>::<activityId>`.
     */
    public function query(
        ?array $activityTypes = null,
        ?\DateTimeInterface $createdAfter = null,
        ?\DateTimeInterface $createdBefore = null,
        ?string $sortDirection = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): QueryActivitiesOutput {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Report\QueryActivities\QueryActivitiesOutput::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param ?array<string> $activityTypes  Filter to specific activity types (e.g. closeActivity, escalationActivity). If omitted, all types are returned.
     * @param ?\DateTimeInterface $createdAfter Retrieve activities created at or after a given timestamp
     * @param ?\DateTimeInterface $createdBefore Retrieve activities created at or before a given timestamp
     * @param ?string $cursor Cursor of the form `<createdAtMs>::<activityId>`.
     * @return array<string, mixed>
     */
    public function rawQuery(
        ?array $activityTypes = null,
        ?\DateTimeInterface $createdAfter = null,
        ?\DateTimeInterface $createdBefore = null,
        ?string $sortDirection = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): array {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
