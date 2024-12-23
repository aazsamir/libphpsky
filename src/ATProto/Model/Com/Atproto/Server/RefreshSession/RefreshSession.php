<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\RefreshSession;

/**
 * Refresh an authentication session. Requires auth using the 'refreshJwt' (not the 'accessJwt').
 * procedure
 */
class RefreshSession implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'com.atproto.server.refreshSession';

    public static function id(): string
    {
        return self::ID;
    }

    function procedure(): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\RefreshSession\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
