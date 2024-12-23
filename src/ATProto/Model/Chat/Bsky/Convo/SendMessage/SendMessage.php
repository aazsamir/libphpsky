<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\SendMessage;

/**
 * procedure
 */
class SendMessage implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'chat.bsky.convo.sendMessage';

    public static function id(): string
    {
        return self::ID;
    }

    function procedure(Input $input): \Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\Defs\MessageView
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\Defs\MessageView::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
