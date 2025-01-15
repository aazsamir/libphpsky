<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\RequestAccountDelete;

/**
 * Initiate a user account deletion via email.
 * procedure
 */
class RequestAccountDelete implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'com.atproto.server.requestAccountDelete';

    public static function id(): string
    {
        return self::ID;
    }

    public function procedure(): void
    {
        $this->request($this->argsWithKeys(func_get_args()));
    }
}
