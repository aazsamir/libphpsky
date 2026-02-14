<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\Begin;

/**
 * Initiate Age Assurance for an account.
 * procedure
 */
class Begin implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'app.bsky.ageassurance.begin';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(Input $input): \Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\Defs\State
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Ageassurance\Defs\State::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
