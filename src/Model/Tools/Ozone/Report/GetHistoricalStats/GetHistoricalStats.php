<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Report\GetHistoricalStats;

/**
 * Get historical daily report statistics. Returns a paginated list of daily stat snapshots, newest first. Filter by queue, moderator, or report type.
 * query
 */
class GetHistoricalStats implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.report.getHistoricalStats';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param ?int $queueId Filter stats by queue. Use -1 for unqueued reports.
     * @param ?string $moderatorDid Filter stats by moderator DID.
     * @param ?array<string> $reportTypes  Filter stats by report types.
     * @param ?\DateTimeInterface $startDate Earliest date to include (inclusive).
     * @param ?\DateTimeInterface $endDate Latest date to include (inclusive).
     * @param ?int $limit Maximum number of entries to return.
     * @param ?string $cursor Pagination cursor.
     */
    public function query(
        ?int $queueId = null,
        ?string $moderatorDid = null,
        ?array $reportTypes = null,
        ?\DateTimeInterface $startDate = null,
        ?\DateTimeInterface $endDate = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): GetHistoricalStatsOutput {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Report\GetHistoricalStats\GetHistoricalStatsOutput::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param ?int $queueId Filter stats by queue. Use -1 for unqueued reports.
     * @param ?string $moderatorDid Filter stats by moderator DID.
     * @param ?array<string> $reportTypes  Filter stats by report types.
     * @param ?\DateTimeInterface $startDate Earliest date to include (inclusive).
     * @param ?\DateTimeInterface $endDate Latest date to include (inclusive).
     * @param ?int $limit Maximum number of entries to return.
     * @param ?string $cursor Pagination cursor.
     * @return array<string, mixed>
     */
    public function rawQuery(
        ?int $queueId = null,
        ?string $moderatorDid = null,
        ?array $reportTypes = null,
        ?\DateTimeInterface $startDate = null,
        ?\DateTimeInterface $endDate = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): array {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
