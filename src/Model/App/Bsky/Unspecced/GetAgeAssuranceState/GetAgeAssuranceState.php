<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\GetAgeAssuranceState;

/**
 * Returns the current state of the age assurance process for an account. This is used to check if the user has completed age assurance or if further action is required.
 * query
 */
class GetAgeAssuranceState implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.unspecced.getAgeAssuranceState';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function query(): \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs\AgeAssuranceState
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs\AgeAssuranceState::fromArray($this->request($this->argsWithKeys(func_get_args())));
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
