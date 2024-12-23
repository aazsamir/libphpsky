<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\ListAppPasswords;

/**
 * List all App Passwords.
 * query
 */
class ListAppPasswords implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.server.listAppPasswords';

    public static function id(): string
    {
        return self::ID;
    }

    function query(): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\ListAppPasswords\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
