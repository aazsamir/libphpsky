<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Server\GetCapabilities;

/**
 * object
 */
class NotificationConfig implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'notificationConfig';
    public const ID = 'tools.ozone.server.getCapabilities';

    /** @var array<string> */
    public array $channels = [];

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
        return ['channels'];
    }

    /**
     * @param array<string> $channels
     */
    public static function new(array $channels): self
    {
        $instance = new self();
        $instance->channels = $channels;

        return $instance;
    }
}
