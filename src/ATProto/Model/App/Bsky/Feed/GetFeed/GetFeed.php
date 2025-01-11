<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\GetFeed;

/**
 * Get a hydrated feed from an actor's selected feed generator. Implemented by App View.
 * query
 */
class GetFeed implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.feed.getFeed';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(string $feed, ?int $limit = null, ?string $cursor = null): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\GetFeed\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
