<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\GetLists;

/**
 * Enumerates the lists created by a specified account (actor).
 * query
 */
class GetLists implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.graph.getLists';

    public static function id(): string
    {
        return self::ID;
    }

    function query(string $actor, ?int $limit = null, ?string $cursor = null): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\GetLists\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
