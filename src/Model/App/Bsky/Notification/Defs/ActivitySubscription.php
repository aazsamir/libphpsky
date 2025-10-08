<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs;

/**
 * object
 */
class ActivitySubscription implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'activitySubscription';
    public const ID = 'app.bsky.notification.defs';

    public bool $post;
    public bool $reply;

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
        return ['post', 'reply'];
    }

    public static function new(bool $post, bool $reply): self
    {
        $instance = new self();
        $instance->post = $post;
        $instance->reply = $reply;

        return $instance;
    }
}
