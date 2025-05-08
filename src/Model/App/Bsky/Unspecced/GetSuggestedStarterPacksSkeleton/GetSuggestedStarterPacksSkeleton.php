<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetSuggestedStarterPacksSkeleton;

/**
 * Get a skeleton of suggested starterpacks. Intended to be called and hydrated by app.bsky.unspecced.getSuggestedStarterpacks
 * query
 */
class GetSuggestedStarterPacksSkeleton implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.unspecced.getSuggestedStarterPacksSkeleton';

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
    public function query(?string $viewer = null, ?int $limit = null): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetSuggestedStarterPacksSkeleton\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
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
