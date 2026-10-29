<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Server\GetCapabilities;

/**
 * object
 */
class GetCapabilitiesOutput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.server.getCapabilities';

    public ?NotificationConfig $notifications;

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
        return [];
    }

    public static function new(?NotificationConfig $notifications = null): self
    {
        $instance = new self();
        if ($notifications !== null) {
            $instance->notifications = $notifications;
        }

        return $instance;
    }
}
