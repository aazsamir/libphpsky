<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\InitAgeAssurance;

/**
 * Initiate age assurance for an account. This is a one-time action that will start the process of verifying the user's age.
 * procedure
 */
class InitAgeAssurance implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'app.bsky.unspecced.initAgeAssurance';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(Input $input): \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs\AgeAssuranceState
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\Defs\AgeAssuranceState::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
