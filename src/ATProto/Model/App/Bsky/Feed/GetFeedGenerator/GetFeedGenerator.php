<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\GetFeedGenerator;

/**
 * Get information about a feed generator. Implemented by AppView.
 * query
 */
class GetFeedGenerator implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.feed.getFeedGenerator';

    public static function id(): string
    {
        return self::ID;
    }

    function query(string $feed): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Feed\GetFeedGenerator\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
