<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetQuotes;

/**
 * Get a list of quotes for a given post.
 * query
 */
class GetQuotes implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.feed.getQuotes';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param string $uri Reference (AT-URI) of post record
     * @param ?string $cid If supplied, filters to quotes of specific version (by CID) of the post record.
     */
    public function query(string $uri, ?string $cid = null, ?int $limit = null, ?string $cursor = null): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetQuotes\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @param string $uri Reference (AT-URI) of post record
     * @param ?string $cid If supplied, filters to quotes of specific version (by CID) of the post record.
     * @return array<string, mixed>
     */
    public function rawQuery(string $uri, ?string $cid = null, ?int $limit = null, ?string $cursor = null): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
