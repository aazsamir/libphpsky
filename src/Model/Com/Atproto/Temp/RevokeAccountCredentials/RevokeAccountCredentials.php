<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Temp\RevokeAccountCredentials;

/**
 * Revoke sessions, password, and app passwords associated with account. May be resolved by a password reset.
 * procedure
 */
class RevokeAccountCredentials implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'com.atproto.temp.revokeAccountCredentials';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(Input $input): void
    {
        $this->request($this->argsWithKeys(func_get_args()));
    }
}
