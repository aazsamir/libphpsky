<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Report\GetReport;

/**
 * Get details about a single moderation report by ID.
 * query
 */
class GetReport implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.report.getReport';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param int $id The ID of the report to retrieve.
     */
    public function query(int $id): \Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\ReportView
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Report\Defs\ReportView::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param int $id The ID of the report to retrieve.
     * @return array<string, mixed>
     */
    public function rawQuery(int $id): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
