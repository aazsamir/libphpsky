<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Notification\GetUnreadCount;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.notification.getUnreadCount';

    public int $count;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(int $count): self
    {
        $instance = new self();
        $instance->count = $count;

        return $instance;
    }
}
