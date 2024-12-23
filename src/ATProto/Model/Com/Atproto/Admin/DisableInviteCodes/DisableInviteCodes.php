<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Admin\DisableInviteCodes;

/**
 * Disable some set of codes and/or all codes associated with a set of users.
 * procedure
 */
class DisableInviteCodes implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'com.atproto.admin.disableInviteCodes';

    public static function id(): string
    {
        return self::ID;
    }

    function procedure(Input $input): void
    {
        $this->request($this->argsWithKeys(func_get_args()));
    }
}
