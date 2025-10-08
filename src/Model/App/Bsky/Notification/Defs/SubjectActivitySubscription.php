<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs;

/**
 * Object used to store activity subscription data in stash.
 * object
 */
class SubjectActivitySubscription implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'subjectActivitySubscription';
    public const ID = 'app.bsky.notification.defs';

    public string $subject;
    public ActivitySubscription $activitySubscription;

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

    public static function new(string $subject, ActivitySubscription $activitySubscription): self
    {
        $instance = new self();
        $instance->subject = $subject;
        $instance->activitySubscription = $activitySubscription;

        return $instance;
    }
}
