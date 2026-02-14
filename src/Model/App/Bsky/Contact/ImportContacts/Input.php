<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Contact\ImportContacts;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'app.bsky.contact.importContacts';

    /** @var string JWT to authenticate the call. Use the JWT received as a response to the call to `app.bsky.contact.verifyPhone`. */
    public string $token;

    /** @var array<string> List of phone numbers in global E.164 format (e.g., '+12125550123'). Phone numbers that cannot be normalized into a valid phone number will be discarded. Should not repeat the 'phone' input used in `app.bsky.contact.verifyPhone`. */
    public array $contacts = [];

    public static function id(): string
    {
        return self::ID;
    }

    public static function name(): string
    {
        return self::NAME;
    }

    public static function nullable(): array
    {
        return [];
    }

    public static function required(): array
    {
        return ['token', 'contacts'];
    }

    /**
     * @param array<string> $contacts
     */
    public static function new(string $token, array $contacts): self
    {
        $instance = new self();
        $instance->token = $token;
        $instance->contacts = $contacts;

        return $instance;
    }
}
