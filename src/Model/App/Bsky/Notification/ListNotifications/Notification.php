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
    public ?\Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs\ProfileView $author;
    public string $reason;
    public ?string $reasonSubject;
    public mixed $record;
    public bool $isRead;
    public \DateTimeInterface $indexedAt;

    /** @var array<\Aazsamir\Libphpsky\Model\Com\Atproto\Label\Defs\Label>|null */
    public ?array $labels = [];

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
        return ['uri', 'cid', 'author', 'reason', 'record', 'isRead', 'indexedAt'];
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
        ?array $labels = [],
    ): self {
        $instance = new self();
        $instance->uri = $uri;
        $instance->cid = $cid;
        $instance->reason = $reason;
        $instance->record = $record;
        $instance->isRead = $isRead;
        $instance->indexedAt = $indexedAt;
        if ($author !== null) {
            $instance->author = $author;
        }
        if ($reasonSubject !== null) {
            $instance->reasonSubject = $reasonSubject;
        }
        if ($labels !== null) {
            $instance->labels = $labels;
        }

        return $instance;
    }
}
