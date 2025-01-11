<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\GetStarterPack;

/**
 * Gets a view of a starter pack.
 * query
 */
class GetStarterPack implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.graph.getStarterPack';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(string $starterPack): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\GetStarterPack\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
