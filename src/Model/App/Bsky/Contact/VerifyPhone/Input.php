<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Contact\VerifyPhone;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'app.bsky.contact.verifyPhone';

    /** @var string The phone number to verify. Should be the same as the one passed to `app.bsky.contact.startPhoneVerification`. */
    public string $phone;

    /** @var string The code received via SMS as a result of the call to `app.bsky.contact.startPhoneVerification`. */
    public string $code;

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
        return ['phone', 'code'];
    }

    public static function new(string $phone, string $code): self
    {
        $instance = new self();
        $instance->phone = $phone;
        $instance->code = $code;

        return $instance;
    }
}
