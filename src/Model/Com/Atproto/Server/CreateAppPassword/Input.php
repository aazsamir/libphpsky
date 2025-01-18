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

    public string $name;
    public ?bool $privileged = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $name, ?bool $privileged = null): self
    {
        $instance = new self();
        $instance->name = $name;
        $instance->privileged = $privileged;

        return $instance;
    }
}
