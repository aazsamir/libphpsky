<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\ScheduleAction;

/**
 * Schedule a moderation action to be executed at a future time
 * procedure
 */
class ScheduleAction implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.moderation.scheduleAction';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(Input $input): ScheduledActionResults
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\ScheduleAction\ScheduledActionResults::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
