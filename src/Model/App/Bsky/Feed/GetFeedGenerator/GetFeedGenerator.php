<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetFeedGenerator;

/**
 * Get information about a feed generator. Implemented by AppView.
 * query
 */
class GetFeedGenerator implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.feed.getFeedGenerator';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param string $feed AT-URI of the feed generator record.
     */
    public function query(string $feed): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetFeedGenerator\Output::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param string $feed AT-URI of the feed generator record.
     * @return array<string, mixed>
     */
    public function rawQuery(string $feed): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
