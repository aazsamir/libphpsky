<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\DeleteMessageForSelf;

/**
 * procedure
 */
class DeleteMessageForSelf implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'chat.bsky.convo.deleteMessageForSelf';

    public static function id(): string
    {
        return self::ID;
    }

    function procedure(Input $input): \Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\Defs\DeletedMessageView
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\Defs\DeletedMessageView::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
