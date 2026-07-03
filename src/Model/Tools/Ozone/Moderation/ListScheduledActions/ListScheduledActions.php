<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\ListScheduledActions;

/**
 * List scheduled moderation actions with optional filtering
 * procedure
 */
class ListScheduledActions implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.moderation.listScheduledActions';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(ListScheduledActionsInput $input): ListScheduledActionsOutput
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\ListScheduledActions\ListScheduledActionsOutput::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
