<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\RequestEmailConfirmation;

/**
 * Request an email with a code to confirm ownership of email.
 * procedure
 */
class RequestEmailConfirmation implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'com.atproto.server.requestEmailConfirmation';

    public static function id(): string
    {
        return self::ID;
    }

    function procedure(): void
    {
        $this->request($this->argsWithKeys(func_get_args()));
    }
}
