<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Notification\UpdateSeen;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;

    public const NAME = 'input';
    public const ID = 'app.bsky.notification.updateSeen';

    public \DateTimeInterface $seenAt;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(\DateTimeInterface $seenAt): self
    {
        $instance = new self();
        $instance->seenAt = $seenAt;

        return $instance;
    }
}