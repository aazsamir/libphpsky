<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetRepostedBy;

/**
 * Get a list of reposts for a given post.
 * query
 */
class GetRepostedBy implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.feed.getRepostedBy';

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
     * @param ?string $cid If supplied, filters to reposts of specific version (by CID) of the post record.
     */
    public function query(string $uri, ?string $cid = null, ?int $limit = null, ?string $cursor = null): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetRepostedBy\Output::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param string $uri Reference (AT-URI) of post record
     * @param ?string $cid If supplied, filters to reposts of specific version (by CID) of the post record.
     * @return array<string, mixed>
     */
    public function rawQuery(string $uri, ?string $cid = null, ?int $limit = null, ?string $cursor = null): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
