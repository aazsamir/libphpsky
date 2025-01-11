<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Identity\SignPlcOperation;

/**
 * Signs a PLC operation to update some value(s) in the requesting DID's document.
 * procedure
 */
class SignPlcOperation implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'com.atproto.identity.signPlcOperation';

    public static function id(): string
    {
        return self::ID;
    }

    public function procedure(Input $input): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Identity\SignPlcOperation\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
