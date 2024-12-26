<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\GetBlocks;

/**
 * Enumerates which accounts the requesting account is currently blocking. Requires auth.
 * query
 */
class GetBlocks implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.graph.getBlocks';

    public static function id(): string
    {
        return self::ID;
    }

    function query(?int $limit = null, ?string $cursor = null): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\GetBlocks\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
