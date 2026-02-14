<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Contact\ImportContacts;

/**
 * Import contacts for securely matching with other users. This follows the protocol explained in https://docs.bsky.app/blog/contact-import-rfc. Requires authentication.
 * procedure
 */
class ImportContacts implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsProcedure;

    public const NAME = 'main';
    public const ID = 'app.bsky.contact.importContacts';

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
        return \Aazsamir\Libphpsky\Model\App\Bsky\Contact\ImportContacts\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
