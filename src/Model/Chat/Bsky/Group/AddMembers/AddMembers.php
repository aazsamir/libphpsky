<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Group\AddMembers;

/**
 * Adds members to a group. The members are added in 'request' status, so they have to accept it. This creates convo memberships.
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

    /**
     * @return array<string, mixed>
     */
    public function rawProcedure(AddMembersInput $input): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
