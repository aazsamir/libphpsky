<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetStarterPacks;

/**
 * Get views for a list of starter packs.
 * query
 */
class GetStarterPacks implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.graph.getStarterPacks';

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<string> $uris
     */
    public function query(array $uris): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetStarterPacks\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
