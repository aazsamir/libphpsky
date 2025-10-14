<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetLists;

/**
 * Enumerates the lists created by a specified account (actor).
 * query
 */
class GetLists implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.graph.getLists';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param string $actor The account (actor) to enumerate lists from.
     * @param ?array<string> $purposes  Optional filter by list purpose. If not specified, all supported types are returned.
     */
    public function query(string $actor, ?int $limit = null, ?string $cursor = null, ?array $purposes = null): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetLists\Output::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param string $actor The account (actor) to enumerate lists from.
     * @param ?array<string> $purposes  Optional filter by list purpose. If not specified, all supported types are returned.
     * @return array<string, mixed>
     */
    public function rawQuery(
        string $actor,
        ?int $limit = null,
        ?string $cursor = null,
        ?array $purposes = null,
    ): array {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
