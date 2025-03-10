<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\CreateAppPassword;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.server.createAppPassword';

    /** @var string A short name for the App Password, to help distinguish them. */
    public string $name;

    /** @var ?bool If an app password has 'privileged' access to possibly sensitive account state. Meant for use with trusted clients. */
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
        return ['name'];
    }

    public static function new(string $name, ?bool $privileged = null): self
    {
        $instance = new self();
        $instance->name = $name;
        if ($privileged !== null) {
            $instance->privileged = $privileged;
        }

        return $instance;
    }
}
