<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Contact\DismissMatch;

/**
 * Removes a match that was found via contact import. It shouldn't appear again if the same contact is re-imported. Requires authentication.
 * procedure
 */
class DismissMatch implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'app.bsky.contact.dismissMatch';

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public function procedure(Input $input): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Contact\DismissMatch\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
