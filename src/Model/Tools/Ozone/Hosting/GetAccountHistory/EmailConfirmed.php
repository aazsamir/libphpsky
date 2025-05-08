<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Hosting\GetAccountHistory;

/**
 * object
 */
class EmailConfirmed implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'emailConfirmed';
    public const ID = 'tools.ozone.hosting.getAccountHistory';

    public string $email;

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
        return ['email'];
    }

    public static function new(string $email): self
    {
        $instance = new self();
        $instance->email = $email;

        return $instance;
    }
}
