<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Admin\UpdateAccountEmail;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.admin.updateAccountEmail';

    /** @var string The handle or DID of the repo. */
    public string $account;
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
        return ['account', 'email'];
    }

    public static function new(string $account, string $email): self
    {
        $instance = new self();
        $instance->account = $account;
        $instance->email = $email;

        return $instance;
    }
}
