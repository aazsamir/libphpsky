<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\GetStarterPacks;

/**
 * Get views for a list of starter packs.
 * query
 */
class GetStarterPacks implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.graph.getStarterPacks';

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param string[] $uris
     */
    function query(array $uris): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\GetStarterPacks\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
