<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\SendMessage;

/**
 * procedure
 */
class SendMessage implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'chat.bsky.convo.sendMessage';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(Input $input): \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\MessageView
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\MessageView::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
