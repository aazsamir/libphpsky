<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetKnownFollowers;

/**
 * Enumerates accounts which follow a specified account (actor) and are followed by the viewer.
 * query
 */
class GetKnownFollowers implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.graph.getKnownFollowers';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(string $actor, ?int $limit = null, ?string $cursor = null): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetKnownFollowers\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
