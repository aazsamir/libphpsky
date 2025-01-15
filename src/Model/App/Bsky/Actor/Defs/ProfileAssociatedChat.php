<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class ProfileAssociatedChat implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'profileAssociatedChat';
    public const ID = 'app.bsky.actor.defs';

    public string $allowIncoming;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $allowIncoming): self
    {
        $instance = new self();
        $instance->allowIncoming = $allowIncoming;

        return $instance;
    }
}
