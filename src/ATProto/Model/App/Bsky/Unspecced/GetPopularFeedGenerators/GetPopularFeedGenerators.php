<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Unspecced\GetPopularFeedGenerators;

/**
 * An unspecced view of globally popular feed generators.
 * query
 */
class GetPopularFeedGenerators implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.unspecced.getPopularFeedGenerators';

    public static function id(): string
    {
        return self::ID;
    }

    function query(?int $limit = null, ?string $cursor = null, ?string $query = null): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Unspecced\GetPopularFeedGenerators\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
