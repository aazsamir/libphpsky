<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Notification\GetUnreadCount;

/**
 * Count the number of unread notifications for the requesting account. Requires auth.
 * query
 */
class GetUnreadCount implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.notification.getUnreadCount';

    public static function id(): string
    {
        return self::ID;
    }

    public function query(?bool $priority = null, ?string $seenAt = null): Output
    {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Notification\GetUnreadCount\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
