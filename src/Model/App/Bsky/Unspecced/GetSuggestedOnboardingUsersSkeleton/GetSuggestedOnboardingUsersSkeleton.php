<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetSuggestedOnboardingUsersSkeleton;

/**
 * Get a skeleton of suggested users for onboarding. Intended to be called and hydrated by app.bsky.unspecced.getSuggestedOnboardingUsers
 * query
 */
class GetSuggestedOnboardingUsersSkeleton implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.unspecced.getSuggestedOnboardingUsersSkeleton';

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
        return \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetSuggestedOnboardingUsersSkeleton\Output::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
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
