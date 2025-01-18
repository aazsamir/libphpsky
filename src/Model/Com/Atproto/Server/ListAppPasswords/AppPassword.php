<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\ListAppPasswords;

/**
 * object
 */
class AppPassword implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'appPassword';
    public const ID = 'com.atproto.server.listAppPasswords';

    public string $name;
    public \DateTimeInterface $createdAt;
    public ?bool $privileged;

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
        return ['name', 'createdAt'];
    }

    public static function new(string $name, \DateTimeInterface $createdAt, ?bool $privileged = null): self
    {
        $instance = new self();
        $instance->name = $name;
        $instance->createdAt = $createdAt;
        if ($privileged !== null) {
            $instance->privileged = $privileged;
        }

        return $instance;
    }
}
