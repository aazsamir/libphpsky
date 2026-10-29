<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\ListReports;

/**
 * List moderation reports submitted by the authenticated account to this moderation service.
 * query
 */
class ListReports implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.inbox.listReports';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param ?string $did Account to preview. Defaults to the authenticated account; another account requires an active moderator, triage, or admin credential.
     * @param ?string $filter Filter report activity. unread includes reports whose updatedAt is after the reports section's seenAt watermark.
     * @param ?string $cursor An opaque cursor for pagination.
     */
    public function query(
        ?string $did = null,
        ?string $filter = null,
        ?string $sortField = null,
        ?string $sortDirection = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): ListReportsOutput {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\ListReports\ListReportsOutput::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param ?string $did Account to preview. Defaults to the authenticated account; another account requires an active moderator, triage, or admin credential.
     * @param ?string $filter Filter report activity. unread includes reports whose updatedAt is after the reports section's seenAt watermark.
     * @param ?string $cursor An opaque cursor for pagination.
     * @return array<string, mixed>
     */
    public function rawQuery(
        ?string $did = null,
        ?string $filter = null,
        ?string $sortField = null,
        ?string $sortDirection = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): array {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
