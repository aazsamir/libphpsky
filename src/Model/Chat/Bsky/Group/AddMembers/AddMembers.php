<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Group\AddMembers;

/**
 * [NOTE: This is under active development and should be considered unstable while this note is here]. Adds members to a group. The members are added in 'request' status, so they have to accept it. This creates convo memberships.
 * procedure
 */
class AddMembers implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'chat.bsky.group.addMembers';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(AddMembersInput $input): AddMembersOutput
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Group\AddMembers\AddMembersOutput::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
