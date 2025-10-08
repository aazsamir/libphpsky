<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Notification\UnregisterPush;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'input';
    public const ID = 'app.bsky.notification.unregisterPush';

    public string $serviceDid;
    public string $token;
    public string $platform;
    public string $appId;

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
        return ['serviceDid', 'token', 'platform', 'appId'];
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
