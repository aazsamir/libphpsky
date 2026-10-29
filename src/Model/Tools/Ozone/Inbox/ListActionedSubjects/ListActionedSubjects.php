<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\ListActionedSubjects;

/**
 * List subjects belonging to the authenticated account that have moderation actions from this moderation service.
 * query
 */
class ListActionedSubjects implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.inbox.listActionedSubjects';

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
     * @param ?string $filter Filter subject activity. pending includes subjects whose latest appeal report is not closed; resolved includes subjects whose latest appeal report is closed. unread includes subjects whose public updatedAt is after the subjects section's seenAt watermark.
     * @param ?string $cursor An opaque cursor for pagination.
     */
    public function query(
        ?string $did = null,
        ?string $filter = null,
        ?string $sortField = null,
        ?string $sortDirection = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): ListActionedSubjectsOutput {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\ListActionedSubjects\ListActionedSubjectsOutput::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param ?string $did Account to preview. Defaults to the authenticated account; another account requires an active moderator, triage, or admin credential.
     * @param ?string $filter Filter subject activity. pending includes subjects whose latest appeal report is not closed; resolved includes subjects whose latest appeal report is closed. unread includes subjects whose public updatedAt is after the subjects section's seenAt watermark.
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
