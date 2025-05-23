<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetList;

/**
 * Gets a 'view' (with additional context) of a specified list.
 * query
 */
class GetList implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.graph.getList';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param string $list Reference (AT-URI) of the list record to hydrate.
     */
    public function query(string $list, ?int $limit = null, ?string $cursor = null): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetList\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @param string $list Reference (AT-URI) of the list record to hydrate.
     * @return array<string, mixed>
     */
    public function rawQuery(string $list, ?int $limit = null, ?string $cursor = null): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
