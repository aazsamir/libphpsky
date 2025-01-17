<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetPosts;

/**
 * Gets post views for a specified list of posts (by AT-URI). This is sometimes referred to as 'hydrating' a 'feed skeleton'.
 * query
 */
class GetPosts implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.feed.getPosts';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param array<string> $uris
     */
    public function query(array $uris): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetPosts\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
