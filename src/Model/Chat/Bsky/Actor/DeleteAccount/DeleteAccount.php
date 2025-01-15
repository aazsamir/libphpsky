<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\DeleteAccount;

/**
 * procedure
 */
class DeleteAccount implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'chat.bsky.actor.deleteAccount';

    public static function id(): string
    {
        return self::ID;
    }

    public function procedure(): Output
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\DeleteAccount\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
