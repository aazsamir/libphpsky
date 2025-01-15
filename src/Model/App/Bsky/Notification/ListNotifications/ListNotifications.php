<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Notification\ListNotifications;

/**
 * Enumerate notifications for the requesting account. Requires auth.
 * query
 */
class ListNotifications implements \Aazsamir\Libphpsky\Action
{
    use \Aazsamir\Libphpsky\Generator\Prefab\IsQuery;

    public const NAME = 'main';
    public const ID = 'app.bsky.notification.listNotifications';

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param ?array<string> $reasons
     */
    public function query(
        ?array $reasons = null,
        ?int $limit = null,
        ?bool $priority = null,
        ?string $cursor = null,
        ?string $seenAt = null,
    ): Output {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Notification\ListNotifications\Output::fromArray($this->request($this->argsWithKeys(func_get_args())));
    }
}
