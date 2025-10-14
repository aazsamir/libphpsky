<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Set\QuerySets;

/**
 * Query available sets
 * query
 */
class QuerySets implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'tools.ozone.set.querySets';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param ?string $sortDirection Defaults to ascending order of name field.
     */
    public function query(
        ?int $limit = null,
        ?string $cursor = null,
        ?string $namePrefix = null,
        ?string $sortBy = null,
        ?string $sortDirection = null,
    ): Output {
        return \Aazsamir\Libphpsky\Model\Tools\Ozone\Set\QuerySets\Output::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param ?string $sortDirection Defaults to ascending order of name field.
     * @return array<string, mixed>
     */
    public function rawQuery(
        ?int $limit = null,
        ?string $cursor = null,
        ?string $namePrefix = null,
        ?string $sortBy = null,
        ?string $sortDirection = null,
    ): array {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
