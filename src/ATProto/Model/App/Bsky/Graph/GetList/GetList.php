<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\GetList;

/**
 * Gets a 'view' (with additional context) of a specified list.
 * query
 */
class GetList implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.graph.getList';

    public static function id(): string
    {
        return self::ID;
    }

    function query(string $list, int $limit, string $cursor): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\GetList\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
