<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\SearchActorsSkeleton;

/**
 * Backend Actors (profile) search, returns only skeleton.
 * query
 */
class SearchActorsSkeleton implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.unspecced.searchActorsSkeleton';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function query(
        string $q,
        ?string $viewer = null,
        ?bool $typeahead = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): Output {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\SearchActorsSkeleton\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
