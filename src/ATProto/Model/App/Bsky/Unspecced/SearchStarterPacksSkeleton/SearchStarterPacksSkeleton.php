<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Unspecced\SearchStarterPacksSkeleton;

/**
 * Backend Starter Pack search, returns only skeleton.
 * query
 */
class SearchStarterPacksSkeleton implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.unspecced.searchStarterPacksSkeleton';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(string $q, ?string $viewer = null, ?int $limit = null, ?string $cursor = null): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Unspecced\SearchStarterPacksSkeleton\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
