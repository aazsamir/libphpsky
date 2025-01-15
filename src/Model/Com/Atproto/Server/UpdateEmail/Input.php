<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\UpdateEmail;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.server.updateEmail';

    public string $email;
    public ?bool $emailAuthFactor = null;
    public ?string $token = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $email, ?bool $emailAuthFactor = null, ?string $token = null): self
    {
        $instance = new self();
        $instance->email = $email;
        $instance->emailAuthFactor = $emailAuthFactor;
        $instance->token = $token;

        return $instance;
    }
}
