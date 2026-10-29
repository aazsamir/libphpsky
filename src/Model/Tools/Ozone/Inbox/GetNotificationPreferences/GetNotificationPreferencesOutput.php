<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\GetNotificationPreferences;

/**
 * object
 */
class GetNotificationPreferencesOutput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.inbox.getNotificationPreferences';

    public ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\Defs\NotificationPreferences $preferences;

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
        return ['preferences'];
    }

    public static function new(
        ?\Aazsamir\Libphpsky\Model\Tools\Ozone\Inbox\Defs\NotificationPreferences $preferences = null,
    ): self {
        $instance = new self();
        if ($preferences !== null) {
            $instance->preferences = $preferences;
        }

        return $instance;
    }
}
