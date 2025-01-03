<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\QueryStatuses;

/**
 * View moderation statuses of subjects (record or repo).
 * query
 */
class QueryStatuses implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.moderation.queryStatuses';

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param ?string[] $hostingStatuses
     * @param ?string[] $ignoreSubjects
     * @param ?string[] $tags
     * @param ?string[] $excludeTags
     * @param ?string[] $collections
     */
    function query(
        ?int $queueCount = null,
        ?int $queueIndex = null,
        ?string $queueSeed = null,
        ?bool $includeAllUserRecords = null,
        ?string $subject = null,
        ?string $comment = null,
        ?string $reportedAfter = null,
        ?string $reportedBefore = null,
        ?string $reviewedAfter = null,
        ?string $hostingDeletedAfter = null,
        ?string $hostingDeletedBefore = null,
        ?string $hostingUpdatedAfter = null,
        ?string $hostingUpdatedBefore = null,
        ?array $hostingStatuses = null,
        ?string $reviewedBefore = null,
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
    ): Output {
        return \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\QueryStatuses\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
