<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\GetMessages;

/**
 * query
 */
class GetMessages implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'chat.bsky.convo.getMessages';

    public static function id(): string
    {
        return self::ID;
    }

    function query(string $convoId, ?int $limit = null, ?string $cursor = null): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\GetMessages\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
