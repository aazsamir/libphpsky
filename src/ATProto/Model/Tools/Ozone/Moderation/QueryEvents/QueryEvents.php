<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\QueryEvents;

/**
 * List moderation events related to a subject.
 * query
 */
class QueryEvents implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.moderation.queryEvents';

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param string[] $types
     * @param string[] $collections
     * @param string[] $addedLabels
     * @param string[] $removedLabels
     * @param string[] $addedTags
     * @param string[] $removedTags
     * @param string[] $reportTypes
     */
    function query(
        array $types,
        string $createdBy,
        string $sortDirection,
        string $createdAfter,
        string $createdBefore,
        string $subject,
        array $collections,
        string $subjectType,
        bool $includeAllUserRecords,
        int $limit,
        bool $hasComment,
        string $comment,
        array $addedLabels,
        array $removedLabels,
        array $addedTags,
        array $removedTags,
        array $reportTypes,
        string $cursor,
    ): Output {
        return \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\QueryEvents\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
