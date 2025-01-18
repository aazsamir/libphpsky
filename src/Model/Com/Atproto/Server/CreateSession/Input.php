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

    public string $identifier;
    public string $password;
    public ?string $authFactorToken = null;
    public ?bool $allowTakendown = null;

    public static function id(): string
    {
        return self::ID;
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
        $instance->authFactorToken = $authFactorToken;
        $instance->allowTakendown = $allowTakendown;

        return $instance;
    }
}
