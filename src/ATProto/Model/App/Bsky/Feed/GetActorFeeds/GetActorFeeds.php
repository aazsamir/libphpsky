<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\GetActorFeeds;

/**
 * Get a list of feeds (feed generator records) created by the actor (in the actor's repo).
 * query
 */
class GetActorFeeds implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.feed.getActorFeeds';

    public static function id(): string
    {
        return self::ID;
    }

    function query(string $actor, int $limit, string $cursor): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\GetActorFeeds\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
