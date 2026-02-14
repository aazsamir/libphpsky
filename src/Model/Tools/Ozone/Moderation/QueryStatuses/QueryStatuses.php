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
     * @param ?int $queueCount Number of queues being used by moderators. Subjects will be split among all queues.
     * @param ?int $queueIndex Index of the queue to fetch subjects from. Works only when queueCount value is specified.
     * @param ?string $queueSeed A seeder to shuffle/balance the queue items.
     * @param ?bool $includeAllUserRecords All subjects, or subjects from given 'collections' param, belonging to the account specified in the 'subject' param will be returned.
     * @param ?string $subject The subject to get the status for.
     * @param ?string $comment Search subjects by keyword from comments
     * @param ?\DateTimeInterface $reportedAfter Search subjects reported after a given timestamp
     * @param ?\DateTimeInterface $reportedBefore Search subjects reported before a given timestamp
     * @param ?\DateTimeInterface $reviewedAfter Search subjects reviewed after a given timestamp
     * @param ?\DateTimeInterface $hostingDeletedAfter Search subjects where the associated record/account was deleted after a given timestamp
     * @param ?\DateTimeInterface $hostingDeletedBefore Search subjects where the associated record/account was deleted before a given timestamp
     * @param ?\DateTimeInterface $hostingUpdatedAfter Search subjects where the associated record/account was updated after a given timestamp
     * @param ?\DateTimeInterface $hostingUpdatedBefore Search subjects where the associated record/account was updated before a given timestamp
     * @param ?array<string> $hostingStatuses  Search subjects by the status of the associated record/account
     * @param ?\DateTimeInterface $reviewedBefore Search subjects reviewed before a given timestamp
     * @param ?bool $includeMuted By default, we don't include muted subjects in the results. Set this to true to include them.
     * @param ?bool $onlyMuted When set to true, only muted subjects and reporters will be returned.
     * @param ?string $reviewState Specify when fetching subjects in a certain state
     * @param ?array<string> $ignoreSubjects
     * @param ?string $lastReviewedBy Get all subject statuses that were reviewed by a specific moderator
     * @param ?bool $takendown Get subjects that were taken down
     * @param ?bool $appealed Get subjects in unresolved appealed status
     * @param ?array<string> $tags
     * @param ?array<string> $excludeTags
     * @param ?array<string> $collections  If specified, subjects belonging to the given collections will be returned. When subjectType is set to 'account', this will be ignored.
     * @param ?string $subjectType If specified, subjects of the given type (account or record) will be returned. When this is set to 'account' the 'collections' parameter will be ignored. When includeAllUserRecords or subject is set, this will be ignored.
     * @param ?int $minAccountSuspendCount If specified, only subjects that belong to an account that has at least this many suspensions will be returned.
     * @param ?int $minReportedRecordsCount If specified, only subjects that belong to an account that has at least this many reported records will be returned.
     * @param ?int $minTakendownRecordsCount If specified, only subjects that belong to an account that has at least this many taken down records will be returned.
     * @param ?int $minPriorityScore If specified, only subjects that have priority score value above the given value will be returned.
     * @param ?int $minStrikeCount If specified, only subjects that belong to an account that has at least this many active strikes will be returned.
     * @param ?string $ageAssuranceState If specified, only subjects with the given age assurance state will be returned.
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
        ?int $minPriorityScore = null,
        ?int $minStrikeCount = null,
        ?string $ageAssuranceState = null,
    ): Output {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\QueryStatuses\Output::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param ?int $queueCount Number of queues being used by moderators. Subjects will be split among all queues.
     * @param ?int $queueIndex Index of the queue to fetch subjects from. Works only when queueCount value is specified.
     * @param ?string $queueSeed A seeder to shuffle/balance the queue items.
     * @param ?bool $includeAllUserRecords All subjects, or subjects from given 'collections' param, belonging to the account specified in the 'subject' param will be returned.
     * @param ?string $subject The subject to get the status for.
     * @param ?string $comment Search subjects by keyword from comments
     * @param ?\DateTimeInterface $reportedAfter Search subjects reported after a given timestamp
     * @param ?\DateTimeInterface $reportedBefore Search subjects reported before a given timestamp
     * @param ?\DateTimeInterface $reviewedAfter Search subjects reviewed after a given timestamp
     * @param ?\DateTimeInterface $hostingDeletedAfter Search subjects where the associated record/account was deleted after a given timestamp
     * @param ?\DateTimeInterface $hostingDeletedBefore Search subjects where the associated record/account was deleted before a given timestamp
     * @param ?\DateTimeInterface $hostingUpdatedAfter Search subjects where the associated record/account was updated after a given timestamp
     * @param ?\DateTimeInterface $hostingUpdatedBefore Search subjects where the associated record/account was updated before a given timestamp
     * @param ?array<string> $hostingStatuses  Search subjects by the status of the associated record/account
     * @param ?\DateTimeInterface $reviewedBefore Search subjects reviewed before a given timestamp
     * @param ?bool $includeMuted By default, we don't include muted subjects in the results. Set this to true to include them.
     * @param ?bool $onlyMuted When set to true, only muted subjects and reporters will be returned.
     * @param ?string $reviewState Specify when fetching subjects in a certain state
     * @param ?array<string> $ignoreSubjects
     * @param ?string $lastReviewedBy Get all subject statuses that were reviewed by a specific moderator
     * @param ?bool $takendown Get subjects that were taken down
     * @param ?bool $appealed Get subjects in unresolved appealed status
     * @param ?array<string> $tags
     * @param ?array<string> $excludeTags
     * @param ?array<string> $collections  If specified, subjects belonging to the given collections will be returned. When subjectType is set to 'account', this will be ignored.
     * @param ?string $subjectType If specified, subjects of the given type (account or record) will be returned. When this is set to 'account' the 'collections' parameter will be ignored. When includeAllUserRecords or subject is set, this will be ignored.
     * @param ?int $minAccountSuspendCount If specified, only subjects that belong to an account that has at least this many suspensions will be returned.
     * @param ?int $minReportedRecordsCount If specified, only subjects that belong to an account that has at least this many reported records will be returned.
     * @param ?int $minTakendownRecordsCount If specified, only subjects that belong to an account that has at least this many taken down records will be returned.
     * @param ?int $minPriorityScore If specified, only subjects that have priority score value above the given value will be returned.
     * @param ?int $minStrikeCount If specified, only subjects that belong to an account that has at least this many active strikes will be returned.
     * @param ?string $ageAssuranceState If specified, only subjects with the given age assurance state will be returned.
     * @return array<string, mixed>
     */
    public function rawQuery(
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
        ?int $minPriorityScore = null,
        ?int $minStrikeCount = null,
        ?string $ageAssuranceState = null,
    ): array {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
