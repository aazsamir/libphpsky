<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\GetState;

/**
 * Returns server-computed Age Assurance state, if available, and any additional metadata needed to compute Age Assurance state client-side.
 * query
 */
class GetState implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.ageassurance.getState';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function query(string $countryCode, ?string $regionCode = null): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\GetState\Output::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @return array<string, mixed>
     */
    public function rawQuery(string $countryCode, ?string $regionCode = null): array
    {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
