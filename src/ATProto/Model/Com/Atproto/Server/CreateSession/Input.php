<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\CreateSession;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

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
