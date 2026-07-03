<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Group\CreateGroup;

/**
 * Creates a group convo, specifying the members to be added to it. Unlike getConvoForMembers, this isn't idempotent. It will create new groups even if the membership is identical to pre-existing groups. Will create 'request' membership for all members, except the owner who is 'accepted'.
 * procedure
 */
class CreateGroup implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'chat.bsky.group.createGroup';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(CreateGroupInput $input): CreateGroupOutput
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Group\CreateGroup\CreateGroupOutput::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
