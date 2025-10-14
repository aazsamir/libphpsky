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

    public static function name(): string
    {
        return self::NAME;
    }

    /**
     * @param ?array<string> $reasons  Notification reasons to include in response.
     */
    public function query(
        ?array $reasons = null,
        ?int $limit = null,
        ?bool $priority = null,
        ?string $cursor = null,
        ?\DateTimeInterface $seenAt = null,
    ): Output {
        return \Aazsamir\Libphpsky\Model\App\Bsky\Notification\ListNotifications\Output::fromArray($this->request($this->argsWithKeys(func_get_args())), $this->typeResolver);
    }

    /**
     * @param ?array<string> $reasons  Notification reasons to include in response.
     * @return array<string, mixed>
     */
    public function rawQuery(
        ?array $reasons = null,
        ?int $limit = null,
        ?bool $priority = null,
        ?string $cursor = null,
        ?\DateTimeInterface $seenAt = null,
    ): array {
        // @phpstan-ignore-next-line
        return $this->request($this->argsWithKeys(func_get_args()));
    }
}
