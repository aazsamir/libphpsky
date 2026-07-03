<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Chat\Bsky\Notification\Defs;

/**
 * object
 */
class Preferences implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'preferences';
    public const ID = 'chat.bsky.notification.defs';

    public ?ChatPreference $chat;
    public ?ChatPreference $chatRequest;

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
        return ['chat', 'chatRequest'];
    }

    public static function new(?ChatPreference $chat = null, ?ChatPreference $chatRequest = null): self
    {
        $instance = new self();
        if ($chat !== null) {
            $instance->chat = $chat;
        }
        if ($chatRequest !== null) {
            $instance->chatRequest = $chatRequest;
        }

        return $instance;
    }
}
