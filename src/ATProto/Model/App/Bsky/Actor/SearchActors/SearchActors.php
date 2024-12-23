<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\SearchActors;

/**
 * Find actors (profiles) matching search criteria. Does not require auth.
 * query
 */
class SearchActors implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.actor.searchActors';

    public static function id(): string
    {
        return self::ID;
    }

    function query(string $term, string $q, int $limit, string $cursor): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\SearchActors\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
