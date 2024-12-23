<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Notification\ListNotifications;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.notification.listNotifications';

    public ?string $cursor = null;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Notification\ListNotifications\Notification[] */
    public array $notifications = [];
    public ?bool $priority = null;
    public ?string $seenAt = null;

    public static function id(): string
    {
        return self::ID;
    }
}
