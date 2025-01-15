<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\GetConvo;

/**
 * query
 */
class GetConvo implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'chat.bsky.convo.getConvo';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(string $convoId): Output
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\GetConvo\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
