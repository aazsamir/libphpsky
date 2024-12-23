<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Team\UpdateMember;

/**
 * Update a member in the ozone service. Requires admin role.
 * procedure
 */
class UpdateMember implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.team.updateMember';

    public static function id(): string
    {
        return self::ID;
    }

    function procedure(Input $input): \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Team\Defs\Member
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Team\Defs\Member::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
