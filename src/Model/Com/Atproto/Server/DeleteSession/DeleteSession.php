<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\DeleteSession;

/**
 * Delete the current session. Requires auth using the 'refreshJwt' (not the 'accessJwt').
 * procedure
 */
class DeleteSession implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'com.atproto.server.deleteSession';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(): void
    {
        $this->request($this->argsWithKeys(func_get_args()));
    }
}
