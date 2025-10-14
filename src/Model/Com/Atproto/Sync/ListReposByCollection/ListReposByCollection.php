<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Sync\ListReposByCollection;

/**
 * Enumerates all the DIDs which have records with the given collection NSID.
 * query
 */
class ListReposByCollection implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'com.atproto.sync.listReposByCollection';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param ?int $limit Maximum size of response set. Recommend setting a large maximum (1000+) when enumerating large DID lists.
     */
    public function query(string $collection, ?int $limit = null, ?string $cursor = null): Output
    {
        return \Aazsamir\Libphpsky\Model\Com\Atproto\Sync\ListReposByCollection\Output::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param ?int $limit Maximum size of response set. Recommend setting a large maximum (1000+) when enumerating large DID lists.
     * @return array<string, mixed>
     */
    public function rawQuery(string $collection, ?int $limit = null, ?string $cursor = null): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
