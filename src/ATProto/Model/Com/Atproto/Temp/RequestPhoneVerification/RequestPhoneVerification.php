<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Temp\RequestPhoneVerification;

/**
 * Request a verification code to be sent to the supplied phone number
 * procedure
 */
class RequestPhoneVerification implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'com.atproto.temp.requestPhoneVerification';

    public static function id(): string
    {
        return self::ID;
    }

    function procedure(Input $input): void
    {
        $this->request($this->argsWithKeys(func_get_args()));
    }
}
