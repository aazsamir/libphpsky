<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\Defs;

/**
 * object
 */
class Notification implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'notification';
    public const ID = 'tools.ozone.inbox.defs';

    public int $id;
    public string $reason;

    /** @var \Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\Defs\ReportRef|\Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\Defs\SubjectRef|\Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\Defs\StandingRef */
    public mixed $target;
    public bool $isRead;
    public \DateTimeInterface $createdAt;

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
        return ['id', 'reason', 'target', 'isRead', 'createdAt'];
    }

    public static function new(
        int $id,
        string $reason,
        ReportRef|SubjectRef|StandingRef $target,
        bool $isRead,
        \DateTimeInterface $createdAt,
    ): self {
        $instance = new self();
        $instance->id = $id;
        $instance->reason = $reason;
        $instance->target = $target;
        $instance->isRead = $isRead;
        $instance->createdAt = $createdAt;

        return $instance;
    }
}
