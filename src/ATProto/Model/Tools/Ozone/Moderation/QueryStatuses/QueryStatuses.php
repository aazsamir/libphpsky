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
     * @param string[] $hostingStatuses
     * @param string[] $ignoreSubjects
     * @param string[] $tags
     * @param string[] $excludeTags
     * @param string[] $collections
     */
    function query(
        int $queueCount,
        int $queueIndex,
        string $queueSeed,
        bool $includeAllUserRecords,
        string $subject,
        string $comment,
        string $reportedAfter,
        string $reportedBefore,
        string $reviewedAfter,
        string $hostingDeletedAfter,
        string $hostingDeletedBefore,
        string $hostingUpdatedAfter,
        string $hostingUpdatedBefore,
        array $hostingStatuses,
        string $reviewedBefore,
        bool $includeMuted,
        bool $onlyMuted,
        string $reviewState,
        array $ignoreSubjects,
        string $lastReviewedBy,
        string $sortField,
        string $sortDirection,
        bool $takendown,
        bool $appealed,
        int $limit,
        array $tags,
        array $excludeTags,
        string $cursor,
        array $collections,
        string $subjectType,
    ): Output {
        return \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\QueryStatuses\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
