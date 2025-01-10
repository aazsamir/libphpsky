<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Server\CreateAppPassword;

/**
 * object
 */
class AppPassword implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'appPassword';
    public const ID = 'com.atproto.server.createAppPassword';

    public string $name;
    public string $password;
    public string $createdAt;
    public ?bool $privileged = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $name, string $password, string $createdAt, ?bool $privileged = null): self
    {
        $instance = new self();
        $instance->name = $name;
        $instance->password = $password;
        $instance->createdAt = $createdAt;
        $instance->privileged = $privileged;

        return $instance;
    }
}
