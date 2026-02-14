<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Contact\VerifyPhone;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.contact.verifyPhone';

    /** @var string JWT to be used in a call to `app.bsky.contact.importContacts`. It is only valid for a single call. */
    public string $token;

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
        return ['token'];
    }

    public static function new(string $token): self
    {
        $instance = new self();
        $instance->token = $token;

        return $instance;
    }
}
