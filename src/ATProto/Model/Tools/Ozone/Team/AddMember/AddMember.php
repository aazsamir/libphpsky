<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Team\AddMember;

/**
 * Add a member to the ozone team. Requires admin role.
 * procedure
 */
class AddMember implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.team.addMember';

    public static function id(): string
    {
        return self::ID;
    }

    function procedure(Input $input): \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Team\Defs\Member
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Team\Defs\Member::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
