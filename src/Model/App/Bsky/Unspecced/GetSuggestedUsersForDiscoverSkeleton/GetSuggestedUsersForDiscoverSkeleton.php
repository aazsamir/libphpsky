<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetSuggestedUsersForDiscoverSkeleton;

/**
 * Get a skeleton of suggested users for the Discover page. Intended to be called and hydrated by app.bsky.unspecced.getSuggestedUsersForDiscover
 * query
 */
class GetSuggestedUsersForDiscoverSkeleton implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.unspecced.getSuggestedUsersForDiscoverSkeleton';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param ?string $viewer DID of the account making the request (not included for public/unauthenticated queries).
     */
    public function query(?string $viewer = null, ?int $limit = null): GetSuggestedUsersForDiscoverSkeletonOutput
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetSuggestedUsersForDiscoverSkeleton\GetSuggestedUsersForDiscoverSkeletonOutput::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param ?string $viewer DID of the account making the request (not included for public/unauthenticated queries).
     * @return array<string, mixed>
     */
    public function rawQuery(?string $viewer = null, ?int $limit = null): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
