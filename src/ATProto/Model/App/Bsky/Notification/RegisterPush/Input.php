<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\App\Bsky\Notification\RegisterPush;

/**
 * object
 */
class Input implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

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
}
