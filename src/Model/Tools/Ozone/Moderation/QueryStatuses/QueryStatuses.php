<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\QueryStatuses;

/**
 * View moderation statuses of subjects (record or repo).
 * query
 */
class QueryStatuses implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.moderation.queryStatuses';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param ?array<string> $hostingStatuses
     * @param ?array<string> $ignoreSubjects
     * @param ?array<string> $tags
     * @param ?array<string> $excludeTags
     * @param ?array<string> $collections
     */
    public function query(
        ?int $queueCount = null,
        ?int $queueIndex = null,
        ?string $queueSeed = null,
        ?bool $includeAllUserRecords = null,
        ?string $subject = null,
        ?string $comment = null,
        ?\DateTimeInterface $reportedAfter = null,
        ?\DateTimeInterface $reportedBefore = null,
        ?\DateTimeInterface $reviewedAfter = null,
        ?\DateTimeInterface $hostingDeletedAfter = null,
        ?\DateTimeInterface $hostingDeletedBefore = null,
        ?\DateTimeInterface $hostingUpdatedAfter = null,
        ?\DateTimeInterface $hostingUpdatedBefore = null,
        ?array $hostingStatuses = null,
        ?\DateTimeInterface $reviewedBefore = null,
        ?bool $includeMuted = null,
        ?bool $onlyMuted = null,
        ?string $reviewState = null,
        ?array $ignoreSubjects = null,
        ?string $lastReviewedBy = null,
        ?string $sortField = null,
        ?string $sortDirection = null,
        ?bool $takendown = null,
        ?bool $appealed = null,
        ?int $limit = null,
        ?array $tags = null,
        ?array $excludeTags = null,
        ?string $cursor = null,
        ?array $collections = null,
        ?string $subjectType = null,
        ?int $minAccountSuspendCount = null,
        ?int $minReportedRecordsCount = null,
        ?int $minTakendownRecordsCount = null,
    ): Output {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\QueryStatuses\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
