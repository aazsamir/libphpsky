<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetActorStarterPacks;

/**
 * Get a list of starter packs created by the actor.
 * query
 */
class GetActorStarterPacks implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.graph.getActorStarterPacks';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(string $actor, ?int $limit = null, ?string $cursor = null): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetActorStarterPacks\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}