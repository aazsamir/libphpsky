<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetTimeline;

/**
 * Get a view of the requesting account's home timeline. This is expected to be some form of reverse-chronological feed.
 * query
 */
class GetTimeline implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.feed.getTimeline';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(?string $algorithm = null, ?int $limit = null, ?string $cursor = null): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetTimeline\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
