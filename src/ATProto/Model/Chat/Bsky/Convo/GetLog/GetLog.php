<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\GetLog;

/**
 * query
 */
class GetLog implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'chat.bsky.convo.getLog';

    public static function id(): string
    {
        return self::ID;
    }

    function query(string $cursor): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\GetLog\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
