<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\GetConvoForMembers;

/**
 * query
 */
class GetConvoForMembers implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'chat.bsky.convo.getConvoForMembers';

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param string[] $members
     */
    function query(array $members): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\Chat\Bsky\Convo\GetConvoForMembers\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
