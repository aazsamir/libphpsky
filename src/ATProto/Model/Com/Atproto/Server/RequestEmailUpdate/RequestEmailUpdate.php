<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\RequestEmailUpdate;

/**
 * Request a token in order to update email.
 * procedure
 */
class RequestEmailUpdate implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'com.atproto.server.requestEmailUpdate';

    public static function id(): string
    {
        return self::ID;
    }

    function procedure(): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\RequestEmailUpdate\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
