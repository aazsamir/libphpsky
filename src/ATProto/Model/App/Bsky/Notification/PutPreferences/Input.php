<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Notification\PutPreferences;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'app.bsky.notification.putPreferences';

    public bool $priority;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(bool $priority): self
    {
        $instance = new self();
        $instance->priority = $priority;

        return $instance;
    }
}
