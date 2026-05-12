<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Report\QueryReports;

/**
 * View moderation reports. Reports are individual instances of content being reported, as opposed to subject statuses which aggregate reports at the subject level.
 * query
 */
class QueryReports implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.report.queryReports';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param string $status Filter by report status.
     * @param ?int $queueId Filter by queue ID. Use -1 for unassigned reports.
     * @param ?array<string> $reportTypes  Filter by report types (fully qualified string in the format of com.atproto.moderation.defs#reason<name>).
     * @param ?string $subject Filter by subject DID or AT-URI.
     * @param ?string $did Filter to reports where the subject is this DID or any record owned by this DID. Unlike `subject` (which scopes to a specific account or record), this returns all reports tied to the DID across both account-level and record-level subjects.
     * @param ?string $subjectType If specified, reports of the given type (account or record) will be returned.
     * @param ?array<string> $collections  If specified, reports where the subject belongs to the given collections will be returned. When subjectType is set to 'account', this will be ignored.
     * @param ?\DateTimeInterface $reportedAfter Retrieve reports created after a given timestamp
     * @param ?\DateTimeInterface $reportedBefore Retrieve reports created before a given timestamp
     * @param ?bool $isMuted Filter by muted status. true returns only muted reports, false returns only unmuted reports. Defaults to false.
     * @param ?string $assignedTo Filter by the DID of the moderator permanently assigned to the report.
     */
    public function query(
        string $status,
        ?int $queueId = null,
        ?array $reportTypes = null,
        ?string $subject = null,
        ?string $did = null,
        ?string $subjectType = null,
        ?array $collections = null,
        ?\DateTimeInterface $reportedAfter = null,
        ?\DateTimeInterface $reportedBefore = null,
        ?bool $isMuted = null,
        ?string $assignedTo = null,
        ?string $sortField = null,
        ?string $sortDirection = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): Output {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Report\QueryReports\Output::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param string $status Filter by report status.
     * @param ?int $queueId Filter by queue ID. Use -1 for unassigned reports.
     * @param ?array<string> $reportTypes  Filter by report types (fully qualified string in the format of com.atproto.moderation.defs#reason<name>).
     * @param ?string $subject Filter by subject DID or AT-URI.
     * @param ?string $did Filter to reports where the subject is this DID or any record owned by this DID. Unlike `subject` (which scopes to a specific account or record), this returns all reports tied to the DID across both account-level and record-level subjects.
     * @param ?string $subjectType If specified, reports of the given type (account or record) will be returned.
     * @param ?array<string> $collections  If specified, reports where the subject belongs to the given collections will be returned. When subjectType is set to 'account', this will be ignored.
     * @param ?\DateTimeInterface $reportedAfter Retrieve reports created after a given timestamp
     * @param ?\DateTimeInterface $reportedBefore Retrieve reports created before a given timestamp
     * @param ?bool $isMuted Filter by muted status. true returns only muted reports, false returns only unmuted reports. Defaults to false.
     * @param ?string $assignedTo Filter by the DID of the moderator permanently assigned to the report.
     * @return array<string, mixed>
     */
    public function rawQuery(
        string $status,
        ?int $queueId = null,
        ?array $reportTypes = null,
        ?string $subject = null,
        ?string $did = null,
        ?string $subjectType = null,
        ?array $collections = null,
        ?\DateTimeInterface $reportedAfter = null,
        ?\DateTimeInterface $reportedBefore = null,
        ?bool $isMuted = null,
        ?string $assignedTo = null,
        ?string $sortField = null,
        ?string $sortDirection = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): array {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
