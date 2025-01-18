<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Notification\ListNotifications;

/**
 * object
 */
class Notification implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'notification';
    public const ID = 'app.bsky.notification.listNotifications';

    public string $uri;
    public string $cid;
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileView $author = null;
    public string $reason;
    public ?string $reasonSubject = null;
    public mixed $record;
    public bool $isRead;
    public \DateTimeInterface $indexedAt;

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label>|null */
    public ?array $labels = [];

    public static function id(): string
    {
        return self::ID;
    }

    /**
     * @param array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label> $labels
     */
    public static function new(
        string $uri,
        string $cid,
        string $reason,
        mixed $record,
        bool $isRead,
        \DateTimeInterface $indexedAt,
        ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileView $author = null,
        ?string $reasonSubject = null,
        ?array $labels = null,
    ): self {
        $instance = new self();
        $instance->uri = $uri;
        $instance->cid = $cid;
        $instance->reason = $reason;
        $instance->record = $record;
        $instance->isRead = $isRead;
        $instance->indexedAt = $indexedAt;
        $instance->author = $author;
        $instance->reasonSubject = $reasonSubject;
        $instance->labels = $labels;

        return $instance;
    }
}
