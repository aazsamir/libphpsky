<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\ListNotifications;

/**
 * object
 */
class ListNotificationsOutput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.inbox.listNotifications';

    public ?string $cursor;

    /** @var array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\Defs\Notification> */
    public array $notifications = [];

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
        return ['notifications'];
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\Defs\Notification> $notifications
     */
    public static function new(array $notifications, ?string $cursor = null): self
    {
        $instance = new self();
        $instance->notifications = $notifications;
        if ($cursor !== null) {
            $instance->cursor = $cursor;
        }

        return $instance;
    }
}
