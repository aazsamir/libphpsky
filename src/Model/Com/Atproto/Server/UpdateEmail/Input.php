<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\UpdateEmail;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.server.updateEmail';

    public string $email;
    public ?bool $emailAuthFactor;

    /** @var ?string Requires a token from com.atproto.sever.requestEmailUpdate if the account's email has been confirmed. */
    public ?string $token;

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

    public static function new(string $email, ?bool $emailAuthFactor = null, ?string $token = null): self
    {
        $instance = new self();
        $instance->email = $email;
        if ($emailAuthFactor !== null) {
            $instance->emailAuthFactor = $emailAuthFactor;
        }
        if ($token !== null) {
            $instance->token = $token;
        }

        return $instance;
    }
}
