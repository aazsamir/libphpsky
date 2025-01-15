<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\ListConvos;

/**
 * query
 */
class ListConvos implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'chat.bsky.convo.listConvos';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(?int $limit = null, ?string $cursor = null): Output
    {
        return \Aazsamir\Libphpsky\Model\Chat\Bsky\Convo\ListConvos\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
