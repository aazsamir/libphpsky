<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Report\ReassignQueue;

/**
 * Manually reassign a report to a different queue (or unassign it). Records a queueActivity entry on the report.
 * procedure
 */
class ReassignQueue implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.report.reassignQueue';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(ReassignQueueInput $input): ReassignQueueOutput
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Report\ReassignQueue\ReassignQueueOutput::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @return array<string, mixed>
     */
    public function rawProcedure(ReassignQueueInput $input): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
