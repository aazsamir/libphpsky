<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\SearchActorsTypeahead;

/**
 * Find actor suggestions for a prefix search term. Expected use is for auto-completion during text field entry. Does not require auth.
 * query
 */
class SearchActorsTypeahead implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.actor.searchActorsTypeahead';

    public static function id(): string
    {
        return self::ID;
    }

    function query(string $term, string $q, int $limit): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\SearchActorsTypeahead\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
