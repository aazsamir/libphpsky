<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\GetPostThread;

/**
 * Get posts in a thread. Does not require auth, but additional metadata and filtering will be applied for authed requests.
 * query
 */
class GetPostThread implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.feed.getPostThread';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(string $uri, ?int $depth = null, ?int $parentHeight = null): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\GetPostThread\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
