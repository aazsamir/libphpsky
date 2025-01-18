<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Notification\ListNotifications;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.notification.listNotifications';

    public ?string $cursor;

    /** @var array<\Aazsamir\Libphpsky\Model\App\Bsky\Notification\ListNotifications\Notification> */
    public array $notifications = [];
    public ?bool $priority;
    public ?\DateTimeInterface $seenAt;

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
     * @param array<\Aazsamir\Libphpsky\Model\App\Bsky\Notification\ListNotifications\Notification> $notifications
     */
    public static function new(
        array $notifications,
        ?string $cursor = null,
        ?bool $priority = null,
        ?\DateTimeInterface $seenAt = null,
    ): self {
        $instance = new self();
        $instance->notifications = $notifications;
        if ($cursor !== null) {
            $instance->cursor = $cursor;
        }
        if ($priority !== null) {
            $instance->priority = $priority;
        }
        if ($seenAt !== null) {
            $instance->seenAt = $seenAt;
        }

        return $instance;
    }
}
