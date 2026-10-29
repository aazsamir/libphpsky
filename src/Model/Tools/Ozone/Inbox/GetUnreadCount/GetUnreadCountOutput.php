<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\GetUnreadCount;

/**
 * object
 */
class GetUnreadCountOutput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.inbox.getUnreadCount';

    public UnreadCounts $unreadCounts;

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
        return ['unreadCounts'];
    }

    public static function new(UnreadCounts $unreadCounts): self
    {
        $instance = new self();
        $instance->unreadCounts = $unreadCounts;

        return $instance;
    }
}
