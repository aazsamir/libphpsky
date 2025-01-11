<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\CreateAccount;

/**
 * Create an account. Implemented by PDS.
 * procedure
 */
class CreateAccount implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'com.atproto.server.createAccount';

    public static function id(): string
    {
        return self::ID;
    }

    public function procedure(Input $input): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\CreateAccount\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
