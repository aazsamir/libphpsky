<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\GetUnreadCount;

/**
 * object
 */
class UnreadCounts implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'unreadCounts';
    public const ID = 'tools.ozone.inbox.getUnreadCount';

    public int $total;
    public ?int $reports;
    public ?int $subjects;
    public ?int $accountStatus;

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
        return ['total'];
    }

    public static function new(
        int $total,
        ?int $reports = null,
        ?int $subjects = null,
        ?int $accountStatus = null,
    ): self {
        $instance = new self();
        $instance->total = $total;
        if ($reports !== null) {
            $instance->reports = $reports;
        }
        if ($subjects !== null) {
            $instance->subjects = $subjects;
        }
        if ($accountStatus !== null) {
            $instance->accountStatus = $accountStatus;
        }

        return $instance;
    }
}
