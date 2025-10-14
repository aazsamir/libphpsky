<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetSuggestionsSkeleton;

/**
 * Get a skeleton of suggested actors. Intended to be called and then hydrated through app.bsky.actor.getSuggestions
 * query
 */
class GetSuggestionsSkeleton implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.unspecced.getSuggestionsSkeleton';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param ?string $viewer DID of the account making the request (not included for public/unauthenticated queries). Used to boost followed accounts in ranking.
     * @param ?string $relativeToDid DID of the account to get suggestions relative to. If not provided, suggestions will be based on the viewer.
     */
    public function query(
        ?string $viewer = null,
        ?int $limit = null,
        ?string $cursor = null,
        ?string $relativeToDid = null,
    ): Output {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetSuggestionsSkeleton\Output::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param ?string $viewer DID of the account making the request (not included for public/unauthenticated queries). Used to boost followed accounts in ranking.
     * @param ?string $relativeToDid DID of the account to get suggestions relative to. If not provided, suggestions will be based on the viewer.
     * @return array<string, mixed>
     */
    public function rawQuery(
        ?string $viewer = null,
        ?int $limit = null,
        ?string $cursor = null,
        ?string $relativeToDid = null,
    ): array {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
