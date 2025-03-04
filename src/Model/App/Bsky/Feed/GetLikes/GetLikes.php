<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetLikes;

/**
 * Get like records which reference a subject (by AT-URI and CID).
 * query
 */
class GetLikes implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.feed.getLikes';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param string $uri AT-URI of the subject (eg, a post record).
     * @param ?string $cid CID of the subject record (aka, specific version of record), to filter likes.
     */
    public function query(string $uri, ?string $cid = null, ?int $limit = null, ?string $cursor = null): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Feed\GetLikes\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @param string $uri AT-URI of the subject (eg, a post record).
     * @param ?string $cid CID of the subject record (aka, specific version of record), to filter likes.
     * @return array<string, mixed>
     */
    public function rawQuery(string $uri, ?string $cid = null, ?int $limit = null, ?string $cursor = null): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
