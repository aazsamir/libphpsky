<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\AssignModerator;

/**
 * Assign a user to a queue.
 * procedure
 */
class AssignModerator implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.queue.assignModerator';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(Input $input): \Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\Defs\AssignmentView
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\Defs\AssignmentView::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
