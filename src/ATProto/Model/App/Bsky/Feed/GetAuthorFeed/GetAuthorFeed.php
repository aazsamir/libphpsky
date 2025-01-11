<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\GetAuthorFeed;

/**
 * Get a view of an actor's 'author feed' (post and reposts by the author). Does not require auth.
 * query
 */
class GetAuthorFeed implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.feed.getAuthorFeed';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(
        string $actor,
        ?int $limit = null,
        ?string $cursor = null,
        ?string $filter = null,
        ?bool $includePins = null,
    ): Output {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\GetAuthorFeed\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
