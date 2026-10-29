<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Report\CloseReports;

/**
 * Close eligible reports on a subject matching the given criteria. Assigned and escalated reports are excluded. Reports whose current status does not permit a transition to closed are skipped silently. Intended for automated flows that resolve reports without taking action on the subject.
 * procedure
 */
class CloseReports implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.report.closeReports';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(CloseReportsInput $input): CloseReportsOutput
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Report\CloseReports\CloseReportsOutput::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @return array<string, mixed>
     */
    public function rawProcedure(CloseReportsInput $input): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
