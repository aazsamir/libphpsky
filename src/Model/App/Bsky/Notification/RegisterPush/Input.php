<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Notification\RegisterPush;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'app.bsky.notification.registerPush';

    public string $serviceDid;
    public string $token;
    public string $platform;
    public string $appId;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(string $serviceDid, string $token, string $platform, string $appId): self
    {
        $instance = new self();
        $instance->serviceDid = $serviceDid;
        $instance->token = $token;
        $instance->platform = $platform;
        $instance->appId = $appId;

        return $instance;
    }
}
