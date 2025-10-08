<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Unspecced\InitAgeAssurance;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'app.bsky.unspecced.initAgeAssurance';

    /** @var string The user's email address to receive assurance instructions. */
    public string $email;

    /** @var string The user's preferred language for communication during the assurance process. */
    public string $language;

    /** @var string An ISO 3166-1 alpha-2 code of the user's location. */
    public string $countryCode;

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
        return ['email', 'language', 'countryCode'];
    }

    public static function new(string $email, string $language, string $countryCode): self
    {
        $instance = new self();
        $instance->email = $email;
        $instance->language = $language;
        $instance->countryCode = $countryCode;

        return $instance;
    }
}
