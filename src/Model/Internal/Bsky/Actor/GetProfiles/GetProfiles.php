<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Internal\Bsky\Actor\GetProfiles;

/**
 * Get detailed profile views of multiple actors, hydrating social proof (known followers) only for a subset of them. Intended for internal service-to-service use.
 * query
 */
class GetProfiles implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'internal.bsky.actor.getProfiles';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param array<string> $dids
     * @param ?string $viewer DID of the account on whose behalf the request is made (not included for public/unauthenticated requests). Used for viewer-relative state, including social proof.
     * @param ?array<string> $socialProof  DIDs to hydrate social proof (known followers) for. DIDs not also present in `dids` are ignored.
     */
    public function query(array $dids, ?string $viewer = null, ?array $socialProof = null): Output
    {
        return \Aazsamir\Libphpsky\Model\Internal\Bsky\Actor\GetProfiles\Output::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param array<string> $dids
     * @param ?string $viewer DID of the account on whose behalf the request is made (not included for public/unauthenticated requests). Used for viewer-relative state, including social proof.
     * @param ?array<string> $socialProof  DIDs to hydrate social proof (known followers) for. DIDs not also present in `dids` are ignored.
     * @return array<string, mixed>
     */
    public function rawQuery(array $dids, ?string $viewer = null, ?array $socialProof = null): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
