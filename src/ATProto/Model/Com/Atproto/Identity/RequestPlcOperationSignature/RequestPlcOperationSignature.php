<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Identity\RequestPlcOperationSignature;

/**
 * Request an email with a code to in order to request a signed PLC operation. Requires Auth.
 * procedure
 */
class RequestPlcOperationSignature implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'com.atproto.identity.requestPlcOperationSignature';

    public static function id(): string
    {
        return self::ID;
    }

    function procedure(): void
    {
        $this->request($this->argsWithKeys(func_get_args()));
    }
}
