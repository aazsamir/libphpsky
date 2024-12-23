<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\GetTimeline;

/**
 * Get a view of the requesting account's home timeline. This is expected to be some form of reverse-chronological feed.
 * query
 */
class GetTimeline implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.feed.getTimeline';

    public static function id(): string
    {
        return self::ID;
    }

    function query(string $algorithm, int $limit, string $cursor): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\GetTimeline\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
