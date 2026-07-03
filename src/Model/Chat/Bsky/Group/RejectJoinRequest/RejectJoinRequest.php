<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Group\RejectJoinRequest;

/**
 * Rejects a request to join a group (via join link) the user owns. Action taken by the group owner.
 * procedure
 */
class RejectJoinRequest implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'chat.bsky.group.rejectJoinRequest';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(RejectJoinRequestInput $input): RejectJoinRequestOutput
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Group\RejectJoinRequest\RejectJoinRequestOutput::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
