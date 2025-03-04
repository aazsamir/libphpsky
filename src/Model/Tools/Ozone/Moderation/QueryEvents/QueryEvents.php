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
     * @param ?array<string> $types  The types of events (fully qualified string in the format of tools.ozone.moderation.defs#modEvent<name>) to filter by. If not specified, all events are returned.
     * @param ?string $sortDirection Sort direction for the events. Defaults to descending order of created at timestamp.
     * @param ?\DateTimeInterface $createdAfter Retrieve events created after a given timestamp
     * @param ?\DateTimeInterface $createdBefore Retrieve events created before a given timestamp
     * @param ?array<string> $collections  If specified, only events where the subject belongs to the given collections will be returned. When subjectType is set to 'account', this will be ignored.
     * @param ?string $subjectType If specified, only events where the subject is of the given type (account or record) will be returned. When this is set to 'account' the 'collections' parameter will be ignored. When includeAllUserRecords or subject is set, this will be ignored.
     * @param ?bool $includeAllUserRecords If true, events on all record types (posts, lists, profile etc.) or records from given 'collections' param, owned by the did are returned.
     * @param ?bool $hasComment If true, only events with comments are returned
     * @param ?string $comment If specified, only events with comments containing the keyword are returned. Apply || separator to use multiple keywords and match using OR condition.
     * @param ?array<string> $addedLabels  If specified, only events where all of these labels were added are returned
     * @param ?array<string> $removedLabels  If specified, only events where all of these labels were removed are returned
     * @param ?array<string> $addedTags  If specified, only events where all of these tags were added are returned
     * @param ?array<string> $removedTags  If specified, only events where all of these tags were removed are returned
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

    /**
     * @param ?array<string> $types  The types of events (fully qualified string in the format of tools.ozone.moderation.defs#modEvent<name>) to filter by. If not specified, all events are returned.
     * @param ?string $sortDirection Sort direction for the events. Defaults to descending order of created at timestamp.
     * @param ?\DateTimeInterface $createdAfter Retrieve events created after a given timestamp
     * @param ?\DateTimeInterface $createdBefore Retrieve events created before a given timestamp
     * @param ?array<string> $collections  If specified, only events where the subject belongs to the given collections will be returned. When subjectType is set to 'account', this will be ignored.
     * @param ?string $subjectType If specified, only events where the subject is of the given type (account or record) will be returned. When this is set to 'account' the 'collections' parameter will be ignored. When includeAllUserRecords or subject is set, this will be ignored.
     * @param ?bool $includeAllUserRecords If true, events on all record types (posts, lists, profile etc.) or records from given 'collections' param, owned by the did are returned.
     * @param ?bool $hasComment If true, only events with comments are returned
     * @param ?string $comment If specified, only events with comments containing the keyword are returned. Apply || separator to use multiple keywords and match using OR condition.
     * @param ?array<string> $addedLabels  If specified, only events where all of these labels were added are returned
     * @param ?array<string> $removedLabels  If specified, only events where all of these labels were removed are returned
     * @param ?array<string> $addedTags  If specified, only events where all of these tags were added are returned
     * @param ?array<string> $removedTags  If specified, only events where all of these tags were removed are returned
     * @param ?array<string> $reportTypes
     * @param ?array<string> $policies
     * @return array<string, mixed>
     */
    public function rawQuery(
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
    ): array {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
