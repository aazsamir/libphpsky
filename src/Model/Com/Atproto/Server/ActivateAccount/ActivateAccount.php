<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\ActivateAccount;

/**
 * Activates a currently deactivated account. Used to finalize account migration after the account's repo is imported and identity is setup.
 * procedure
 */
class ActivateAccount implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'com.atproto.server.activateAccount';

    public static function id(): string
    {
        return self::ID;
    }

    public function procedure(): void
    {
        $this->request($this->argsWithKeys(func_get_args()));
    }
}
