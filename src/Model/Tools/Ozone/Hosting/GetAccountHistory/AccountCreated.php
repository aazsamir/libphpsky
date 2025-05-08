<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Hosting\GetAccountHistory;

/**
 * object
 */
class AccountCreated implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'accountCreated';
    public const ID = 'tools.ozone.hosting.getAccountHistory';

    public ?string $email;
    public ?string $handle;

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
        return [];
    }

    public static function new(?string $email = null, ?string $handle = null): self
    {
        $instance = new self();
        if ($email !== null) {
            $instance->email = $email;
        }
        if ($handle !== null) {
            $instance->handle = $handle;
        }

        return $instance;
    }
}
