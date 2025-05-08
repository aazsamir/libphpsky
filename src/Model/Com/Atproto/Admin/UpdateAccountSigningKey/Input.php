<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Admin\UpdateAccountSigningKey;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.admin.updateAccountSigningKey';

    public string $did;

    /** @var string Did-key formatted public key */
    public string $signingKey;

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
        return ['did', 'signingKey'];
    }

    public static function new(string $did, string $signingKey): self
    {
        $instance = new self();
        $instance->did = $did;
        $instance->signingKey = $signingKey;

        return $instance;
    }
}
