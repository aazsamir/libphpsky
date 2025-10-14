<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetTrendingTopics;

/**
 * Get a list of trending topics
 * query
 */
class GetTrendingTopics implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.unspecced.getTrendingTopics';

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
     */
    public function query(?string $viewer = null, ?int $limit = null): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetTrendingTopics\Output::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param ?string $viewer DID of the account making the request (not included for public/unauthenticated queries). Used to boost followed accounts in ranking.
     * @return array<string, mixed>
     */
    public function rawQuery(?string $viewer = null, ?int $limit = null): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
