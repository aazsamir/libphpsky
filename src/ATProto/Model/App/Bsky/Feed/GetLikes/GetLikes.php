<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\GetLikes;

/**
 * Get like records which reference a subject (by AT-URI and CID).
 * query
 */
class GetLikes implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.feed.getLikes';

    public static function id(): string
    {
        return self::ID;
    }

    function query(string $uri, string $cid, int $limit, string $cursor): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\GetLikes\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
