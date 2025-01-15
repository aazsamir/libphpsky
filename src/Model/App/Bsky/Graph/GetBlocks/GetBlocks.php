<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetBlocks;

/**
 * Enumerates which accounts the requesting account is currently blocking. Requires auth.
 * query
 */
class GetBlocks implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.graph.getBlocks';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(?int $limit = null, ?string $cursor = null): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetBlocks\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}