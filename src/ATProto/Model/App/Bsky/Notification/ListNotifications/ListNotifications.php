<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Notification\ListNotifications;

/**
 * Enumerate notifications for the requesting account. Requires auth.
 * query
 */
class ListNotifications implements \Aazsamir\Libphpsky\ATProto\Action
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.notification.listNotifications';

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param string[] $reasons
     */
    function query(array $reasons, int $limit, bool $priority, string $cursor, string $seenAt): Output
    {
        return \Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Notification\ListNotifications\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
