<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\DeactivateAccount;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.server.deactivateAccount';

    public ?\DateTimeInterface $deleteAfter;

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
        return [];
    }

    public static function new(?\DateTimeInterface $deleteAfter = null): self
    {
        $instance = new self();
        if ($deleteAfter !== null) {
            $instance->deleteAfter = $deleteAfter;
        }

        return $instance;
    }
}
