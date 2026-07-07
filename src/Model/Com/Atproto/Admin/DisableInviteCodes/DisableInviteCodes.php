<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Admin\DisableInviteCodes;

/**
 * Disable some set of codes and/or all codes associated with a set of users.
 * procedure
 */
class DisableInviteCodes implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'com.atproto.admin.disableInviteCodes';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(DisableInviteCodesInput $input): void
    {
        $this->request($this->argsWithKeys(func_get_args()));
    }

    public function rawProcedure(DisableInviteCodesInput $input): mixed
    {
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
