<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\ListAppPasswords;

/**
 * object
 */
class AppPassword implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'appPassword';
    public const ID = 'com.atproto.server.listAppPasswords';

    public string $name;
    public \DateTimeInterface $createdAt;
    public ?bool $privileged = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $name, \DateTimeInterface $createdAt, ?bool $privileged = null): self
    {
        $instance = new self();
        $instance->name = $name;
        $instance->createdAt = $createdAt;
        $instance->privileged = $privileged;

        return $instance;
    }
}
