<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\GetFollows;

/**
 * Enumerates accounts which a specified account (actor) follows.
 * query
 */
class GetFollows implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.graph.getFollows';

    public static function id(): string
    {
        return self::ID;
    }

    function query(string $actor, int $limit, string $cursor): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\GetFollows\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
