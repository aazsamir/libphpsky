<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\QueryEvents;

/**
 * List moderation events related to a subject.
 * query
 */
class QueryEvents implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.moderation.queryEvents';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param ?array<string> $types
     * @param ?array<string> $collections
     * @param ?array<string> $addedLabels
     * @param ?array<string> $removedLabels
     * @param ?array<string> $addedTags
     * @param ?array<string> $removedTags
     * @param ?array<string> $reportTypes
     * @param ?array<string> $policies
     */
    public function query(
        ?array $types = null,
        ?string $createdBy = null,
        ?string $sortDirection = null,
        ?\DateTimeInterface $createdAfter = null,
        ?\DateTimeInterface $createdBefore = null,
        ?string $subject = null,
        ?array $collections = null,
        ?string $subjectType = null,
        ?bool $includeAllUserRecords = null,
        ?int $limit = null,
        ?bool $hasComment = null,
        ?string $comment = null,
        ?array $addedLabels = null,
        ?array $removedLabels = null,
        ?array $addedTags = null,
        ?array $removedTags = null,
        ?array $reportTypes = null,
        ?array $policies = null,
        ?string $cursor = null,
    ): Output {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\QueryEvents\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
