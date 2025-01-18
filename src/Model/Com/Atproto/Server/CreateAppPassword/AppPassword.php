<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateAppPassword;

/**
 * object
 */
class AppPassword implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'appPassword';
    public const ID = 'com.atproto.server.createAppPassword';

    public string $name;
    public string $password;
    public \DateTimeInterface $createdAt;
    public ?bool $privileged = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        string $name,
        string $password,
        \DateTimeInterface $createdAt,
        ?bool $privileged = null,
    ): self {
        $instance = new self();
        $instance->name = $name;
        $instance->password = $password;
        $instance->createdAt = $createdAt;
        $instance->privileged = $privileged;

        return $instance;
    }
}
