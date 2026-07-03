<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Group\RemoveMembers;

/**
 * [NOTE: This is under active development and should be considered unstable while this note is here]. Removes members from a group. This deletes convo memberships, doesn't just set a status.
 * procedure
 */
class RemoveMembers implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'chat.bsky.group.removeMembers';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(RemoveMembersInput $input): RemoveMembersOutput
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Group\RemoveMembers\RemoveMembersOutput::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
