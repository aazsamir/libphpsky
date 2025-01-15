<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Com\Atproto\Server\DeactivateAccount;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'com.atproto.server.deactivateAccount';

    public ?\DateTimeInterface $deleteAfter = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(?\DateTimeInterface $deleteAfter = null): self
    {
        $instance = new self();
        $instance->deleteAfter = $deleteAfter;

        return $instance;
    }
}
