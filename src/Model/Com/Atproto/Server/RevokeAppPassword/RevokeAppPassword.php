<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\RevokeAppPassword;

/**
 * Revoke an App Password by name.
 * procedure
 */
class RevokeAppPassword implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'com.atproto.server.revokeAppPassword';

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
