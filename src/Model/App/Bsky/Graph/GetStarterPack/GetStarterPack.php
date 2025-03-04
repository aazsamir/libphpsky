<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetStarterPack;

/**
 * Gets a view of a starter pack.
 * query
 */
class GetStarterPack implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.graph.getStarterPack';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param string $starterPack Reference (AT-URI) of the starter pack record.
     */
    public function query(string $starterPack): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Graph\GetStarterPack\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }

    /**
     * @param string $starterPack Reference (AT-URI) of the starter pack record.
     * @return array<string, mixed>
     */
    public function rawQuery(string $starterPack): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
