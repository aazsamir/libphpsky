<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetActorLikes;

/**
 * Get a list of posts liked by an actor. Requires auth, actor must be the requesting account.
 * query
 */
class GetActorLikes implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.feed.getActorLikes';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(string $actor, ?int $limit = null, ?string $cursor = null): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetActorLikes\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
