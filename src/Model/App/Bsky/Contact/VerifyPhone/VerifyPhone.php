<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Contact\VerifyPhone;

/**
 * Verifies control over a phone number with a code received via SMS and starts a contact import session. Requires authentication.
 * procedure
 */
class VerifyPhone implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'app.bsky.contact.verifyPhone';

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
        return \Aazsamir\Libphpsky\Model\App\Bsky\Contact\VerifyPhone\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
