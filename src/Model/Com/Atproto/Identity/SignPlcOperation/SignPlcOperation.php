<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Identity\SignPlcOperation;

/**
 * Signs a PLC operation to update some value(s) in the requesting DID's document.
 * procedure
 */
class SignPlcOperation implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'com.atproto.identity.signPlcOperation';

    public static function id(): string
    {
        return self::ID;
    }

    public function procedure(Input $input): Output
    {
        return \Aazsamir\Libphpsky\Model\Com\Atproto\Identity\SignPlcOperation\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
