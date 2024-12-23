<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\GetSession;

/**
 * Get information about the current auth session. Requires auth.
 * query
 */
class GetSession implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.server.getSession';

    public static function id(): string
    {
        return self::ID;
    }

    function query(): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\GetSession\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
