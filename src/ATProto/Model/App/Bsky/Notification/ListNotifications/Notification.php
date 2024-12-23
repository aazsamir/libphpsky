<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Notification\ListNotifications;

/**
 * object
 */
class Notification implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'notification';
    public const ID = 'app.bsky.notification.listNotifications';

    public string $uri;
    public string $cid;
    public ?\Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Actor\Defs\ProfileView $author = null;
    public string $reason;
    public ?string $reasonSubject = null;
    public mixed $record;
    public bool $isRead;
    public string $indexedAt;

    /** @var \Aazsamir\Libphpsky\ATProto\Model\Com\Atproto\Label\Defs\Label[] */
    public ?array $labels = [];

    public static function id(): string
    {
        return self::ID;
    }
}
