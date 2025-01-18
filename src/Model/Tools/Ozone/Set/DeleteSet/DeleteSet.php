<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Set\DeleteSet;

/**
 * Delete an entire set. Attempting to delete a set that does not exist will result in an error.
 * procedure
 */
class DeleteSet implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.set.deleteSet';

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
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Set\DeleteSet\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
