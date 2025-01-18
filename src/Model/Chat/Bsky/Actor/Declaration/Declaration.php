<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Actor\Declaration;

/**
 * object
 */
class Declaration implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'main';
    public const ID = 'chat.bsky.actor.declaration';

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
