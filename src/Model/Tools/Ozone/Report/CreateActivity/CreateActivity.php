<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Report\CreateActivity;

/**
 * Register an activity on a report. For state-change activity types, validates the transition and updates report.status atomically.
 * procedure
 */
class CreateActivity implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.report.createActivity';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(CreateActivityInput $input): CreateActivityOutput
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Report\CreateActivity\CreateActivityOutput::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @return array<string, mixed>
     */
    public function rawProcedure(CreateActivityInput $input): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
