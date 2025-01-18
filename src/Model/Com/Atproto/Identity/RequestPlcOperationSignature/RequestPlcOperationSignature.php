<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Identity\RequestPlcOperationSignature;

/**
 * Request an email with a code to in order to request a signed PLC operation. Requires Auth.
 * procedure
 */
class RequestPlcOperationSignature implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'com.atproto.identity.requestPlcOperationSignature';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(): void
    {
        $this->request($this->argsWithKeys(func_get_args()));
    }
}
