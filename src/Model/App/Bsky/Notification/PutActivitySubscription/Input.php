<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Notification\PutActivitySubscription;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'app.bsky.notification.putActivitySubscription';

    public string $subject;
    public \Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs\ActivitySubscription $activitySubscription;

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
        return ['subject', 'activitySubscription'];
    }

    public static function new(
        string $subject,
        \Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs\ActivitySubscription $activitySubscription,
    ): self {
        $instance = new self();
        $instance->subject = $subject;
        $instance->activitySubscription = $activitySubscription;

        return $instance;
    }
}
