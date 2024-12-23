<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Actor\DeleteAccount;

/**
 * procedure
 */
class DeleteAccount implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'chat.bsky.actor.deleteAccount';

    public static function id(): string
    {
        return self::ID;
    }

    function procedure(): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Actor\DeleteAccount\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
