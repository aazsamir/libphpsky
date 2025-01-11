<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Temp\AddReservedHandle;

/**
 * Add a handle to the set of reserved handles.
 * procedure
 */
class AddReservedHandle implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'com.atproto.temp.addReservedHandle';

    public static function id(): string
    {
        return self::ID;
    }

    public function procedure(Input $input): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Temp\AddReservedHandle\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
