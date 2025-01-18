<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\DeleteMessageForSelf;

/**
 * procedure
 */
class DeleteMessageForSelf implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'chat.bsky.convo.deleteMessageForSelf';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(Input $input): \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\DeletedMessageView
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\Defs\DeletedMessageView::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
