<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetAuthorFeed;

/**
 * Get a view of an actor's 'author feed' (post and reposts by the author). Does not require auth.
 * query
 */
class GetAuthorFeed implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.feed.getAuthorFeed';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param ?string $filter Combinations of post/repost types to include in response.
     */
    public function query(
        string $actor,
        ?int $limit = null,
        ?string $cursor = null,
        ?string $filter = null,
        ?bool $includePins = null,
    ): Output {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetAuthorFeed\Output::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param ?string $filter Combinations of post/repost types to include in response.
     * @return array<string, mixed>
     */
    public function rawQuery(
        string $actor,
        ?int $limit = null,
        ?string $cursor = null,
        ?string $filter = null,
        ?bool $includePins = null,
    ): array {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
