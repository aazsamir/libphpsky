<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Report\RefreshStats;

/**
 * Recompute report statistics for a date range. Useful for backfilling after failures or data corrections.
 * procedure
 */
class RefreshStats implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.report.refreshStats';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(Input $input): Output
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Report\RefreshStats\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
