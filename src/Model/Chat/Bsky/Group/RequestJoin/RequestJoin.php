<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Group\RequestJoin;

/**
 * [NOTE: This is under active development and should be considered unstable while this note is here]. Sends a request to join a group (via join link) to the group owner. Action taken by the prospective group member.
 * procedure
 */
class RequestJoin implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'chat.bsky.group.requestJoin';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(RequestJoinInput $input): RequestJoinOutput
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Group\RequestJoin\RequestJoinOutput::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
