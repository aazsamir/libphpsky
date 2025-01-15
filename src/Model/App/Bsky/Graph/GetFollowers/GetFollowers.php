<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetFollowers;

/**
 * Enumerates accounts which follow a specified account (actor).
 * query
 */
class GetFollowers implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.graph.getFollowers';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(string $actor, ?int $limit = null, ?string $cursor = null): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetFollowers\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
