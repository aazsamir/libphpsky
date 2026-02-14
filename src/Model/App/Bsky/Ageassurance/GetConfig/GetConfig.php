<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\GetConfig;

/**
 * Returns Age Assurance configuration for use on the client.
 * query
 */
class GetConfig implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.ageassurance.getConfig';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function query(): \Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\Defs\Config
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\Defs\Config::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @return array<string, mixed>
     */
    public function rawQuery(): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
