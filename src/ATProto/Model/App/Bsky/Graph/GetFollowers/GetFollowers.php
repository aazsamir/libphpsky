<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\GetFollowers;

/**
 * Enumerates accounts which follow a specified account (actor).
 * query
 */
class GetFollowers implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.graph.getFollowers';

    public static function id(): string
    {
        return self::ID;
    }

    function query(string $actor, ?int $limit = null, ?string $cursor = null): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\GetFollowers\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
