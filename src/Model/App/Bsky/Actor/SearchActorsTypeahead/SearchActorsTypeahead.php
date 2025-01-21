<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\SearchActorsTypeahead;

/**
 * Find actor suggestions for a prefix search term. Expected use is for auto-completion during text field entry. Does not require auth.
 * query
 */
class SearchActorsTypeahead implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.actor.searchActorsTypeahead';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param ?string $term DEPRECATED: use 'q' instead.
     * @param ?string $q Search query prefix; not a full query string.
     */
    public function query(?string $term = null, ?string $q = null, ?int $limit = null): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Actor\SearchActorsTypeahead\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
