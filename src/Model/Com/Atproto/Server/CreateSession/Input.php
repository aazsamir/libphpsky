<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateSession;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.server.createSession';

    /** @var string Handle or other identifier supported by the server for the authenticating user. */
    public string $identifier;
    public string $password;
    public ?string $authFactorToken;

    /** @var ?bool When true, instead of throwing error for takendown accounts, a valid response with a narrow scoped token will be returned */
    public ?bool $allowTakendown;

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
        return ['identifier', 'password'];
    }

    public static function new(
        string $identifier,
        string $password,
        ?string $authFactorToken = null,
        ?bool $allowTakendown = null,
    ): self {
        $instance = new self();
        $instance->identifier = $identifier;
        $instance->password = $password;
        if ($authFactorToken !== null) {
            $instance->authFactorToken = $authFactorToken;
        }
        if ($allowTakendown !== null) {
            $instance->allowTakendown = $allowTakendown;
        }

        return $instance;
    }
}
