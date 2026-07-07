<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Queue\UnassignModerator;

/**
 * Remove a user's assignment from a queue.
 * procedure
 */
class UnassignModerator implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.queue.unassignModerator';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(UnassignModeratorInput $input): void
    {
        $this->request($this->argsWithKeys(func_get_args()));
    }

    public function rawProcedure(UnassignModeratorInput $input): mixed
    {
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
