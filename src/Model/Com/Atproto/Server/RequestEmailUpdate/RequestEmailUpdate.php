<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\RequestEmailUpdate;

/**
 * Request a token in order to update email.
 * procedure
 */
class RequestEmailUpdate implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'com.atproto.server.requestEmailUpdate';

    public static function id(): string
    {
        return self::ID;
    }

    public function procedure(): Output
    {
        return \Aazsamir\Libphpsky\Model\Com\Atproto\Server\RequestEmailUpdate\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
