<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetSuggestedUsersSkeleton;

/**
 * Get a skeleton of suggested users. Intended to be called and hydrated by app.bsky.unspecced.getSuggestedUsers
 * query
 */
class GetSuggestedUsersSkeleton implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.unspecced.getSuggestedUsersSkeleton';

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
     * @param ?string $category Category of users to get suggestions for.
     */
    public function query(?string $viewer = null, ?string $category = null, ?int $limit = null): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetSuggestedUsersSkeleton\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @param ?string $viewer DID of the account making the request (not included for public/unauthenticated queries).
     * @param ?string $category Category of users to get suggestions for.
     * @return array<string, mixed>
     */
    public function rawQuery(?string $viewer = null, ?string $category = null, ?int $limit = null): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
