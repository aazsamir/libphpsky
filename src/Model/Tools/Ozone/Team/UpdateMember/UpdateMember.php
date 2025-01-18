<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Team\UpdateMember;

/**
 * Update a member in the ozone service. Requires admin role.
 * procedure
 */
class UpdateMember implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.team.updateMember';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(Input $input): \Aazsamir\Libphpsky\Model\Tools\Ozone\Team\Defs\Member
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Team\Defs\Member::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
