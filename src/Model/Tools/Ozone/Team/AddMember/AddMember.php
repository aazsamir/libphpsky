<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Team\AddMember;

/**
 * Add a member to the ozone team. Requires admin role.
 * procedure
 */
class AddMember implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'tools.ozone.team.addMember';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(AddMemberInput $input): \Aazsamir\Libphpsky\Model\Tools\Ozone\Team\Defs\Member
    {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Team\Defs\Member::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @return array<string, mixed>
     */
    public function rawProcedure(AddMemberInput $input): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
