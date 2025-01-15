<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetSuggestedFollowsByActor;

/**
 * Enumerates follows similar to a given account (actor). Expected use is to recommend additional accounts immediately after following one account.
 * query
 */
class GetSuggestedFollowsByActor implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.graph.getSuggestedFollowsByActor';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(string $actor): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetSuggestedFollowsByActor\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
