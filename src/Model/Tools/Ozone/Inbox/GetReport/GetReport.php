<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\GetReport;

/**
 * Get a moderation report submitted by the authenticated account to this moderation service.
 * query
 */
class GetReport implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.inbox.getReport';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param int $id Report ID (report table ID), as returned by listReports.
     * @param ?string $did Reporter to preview. Defaults to the authenticated account; another account requires an active moderator, triage, or admin credential.
     */
    public function query(int $id, ?string $did = null): GetReportOutput
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\GetReport\GetReportOutput::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param int $id Report ID (report table ID), as returned by listReports.
     * @param ?string $did Reporter to preview. Defaults to the authenticated account; another account requires an active moderator, triage, or admin credential.
     * @return array<string, mixed>
     */
    public function rawQuery(int $id, ?string $did = null): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
