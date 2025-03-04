<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetRelationships;

/**
 * Enumerates public relationships between one account, and a list of other accounts. Does not require auth.
 * query
 */
class GetRelationships implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.graph.getRelationships';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param string $actor Primary account requesting relationships for.
     * @param ?array<string> $others  List of 'other' accounts to be related back to the primary.
     */
    public function query(string $actor, ?array $others = null): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetRelationships\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @param string $actor Primary account requesting relationships for.
     * @param ?array<string> $others  List of 'other' accounts to be related back to the primary.
     * @return array<string, mixed>
     */
    public function rawQuery(string $actor, ?array $others = null): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
