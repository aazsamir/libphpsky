<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\LeaveConvo;

/**
 * procedure
 */
class LeaveConvo implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'chat.bsky.convo.leaveConvo';

    public static function id(): string
    {
        return self::ID;
    }

    function procedure(Input $input): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\LeaveConvo\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
