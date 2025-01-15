<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetListMutes;

/**
 * Enumerates mod lists that the requesting account (actor) currently has muted. Requires auth.
 * query
 */
class GetListMutes implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.graph.getListMutes';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(?int $limit = null, ?string $cursor = null): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetListMutes\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
