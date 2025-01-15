<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Temp\AddReservedHandle;

/**
 * Add a handle to the set of reserved handles.
 * procedure
 */
class AddReservedHandle implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'com.atproto.temp.addReservedHandle';

    public static function id(): string
    {
        return self::ID;
    }

    public function procedure(Input $input): Output
    {
        return \Aazsamir\Libphpsky\Model\Com\Atproto\Temp\AddReservedHandle\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
