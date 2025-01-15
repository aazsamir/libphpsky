<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetPopularFeedGenerators;

/**
 * An unspecced view of globally popular feed generators.
 * query
 */
class GetPopularFeedGenerators implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.unspecced.getPopularFeedGenerators';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(?int $limit = null, ?string $cursor = null, ?string $query = null): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetPopularFeedGenerators\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
