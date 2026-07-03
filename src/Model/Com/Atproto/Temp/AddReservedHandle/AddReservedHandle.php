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

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(AddReservedHandleInput $input): AddReservedHandleOutput
    {
        return \Aazsamir\Libphpsky\Model\Com\Atproto\Temp\AddReservedHandle\AddReservedHandleOutput::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
