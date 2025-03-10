<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetFeedSkeleton;

/**
 * Get a skeleton of a feed provided by a feed generator. Auth is optional, depending on provider requirements, and provides the DID of the requester. Implemented by Feed Generator Service.
 * query
 */
class GetFeedSkeleton implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.feed.getFeedSkeleton';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param string $feed Reference to feed generator record describing the specific feed being requested.
     */
    public function query(string $feed, ?int $limit = null, ?string $cursor = null): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetFeedSkeleton\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @param string $feed Reference to feed generator record describing the specific feed being requested.
     * @return array<string, mixed>
     */
    public function rawQuery(string $feed, ?int $limit = null, ?string $cursor = null): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
