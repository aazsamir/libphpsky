<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\GetRelationships;

/**
 * Enumerates public relationships between one account, and a list of other accounts. Does not require auth.
 * query
 */
class GetRelationships implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.graph.getRelationships';

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param string[] $others
     */
    function query(string $actor, array $others): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Graph\GetRelationships\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
