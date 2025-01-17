<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\SearchStarterPacksSkeleton;

/**
 * Backend Starter Pack search, returns only skeleton.
 * query
 */
class SearchStarterPacksSkeleton implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.unspecced.searchStarterPacksSkeleton';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function query(string $q, ?string $viewer = null, ?int $limit = null, ?string $cursor = null): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\SearchStarterPacksSkeleton\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
