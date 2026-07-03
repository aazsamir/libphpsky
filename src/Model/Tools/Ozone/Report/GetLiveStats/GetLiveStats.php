<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Report\GetLiveStats;

/**
 * Get live report statistics from the past 24 hours. Filter by queue, moderator, or report type. Omit all parameters for aggregate stats.
 * query
 */
class GetLiveStats implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.report.getLiveStats';

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
     */
    public function query(
        ?int $queueId = null,
        ?string $moderatorDid = null,
        ?array $reportTypes = null,
    ): GetLiveStatsOutput {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Report\GetLiveStats\GetLiveStatsOutput::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param ?int $queueId Filter stats by queue. Use -1 for unqueued reports.
     * @param ?string $moderatorDid Filter stats by moderator DID.
     * @param ?array<string> $reportTypes  Filter stats by report types.
     * @return array<string, mixed>
     */
    public function rawQuery(?int $queueId = null, ?string $moderatorDid = null, ?array $reportTypes = null): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
