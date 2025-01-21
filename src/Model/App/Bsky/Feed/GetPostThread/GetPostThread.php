<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetPostThread;

/**
 * Get posts in a thread. Does not require auth, but additional metadata and filtering will be applied for authed requests.
 * query
 */
class GetPostThread implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.feed.getPostThread';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param string $uri Reference (AT-URI) to post record.
     * @param ?int $depth How many levels of reply depth should be included in response.
     * @param ?int $parentHeight How many levels of parent (and grandparent, etc) post to include.
     */
    public function query(string $uri, ?int $depth = null, ?int $parentHeight = null): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetPostThread\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
