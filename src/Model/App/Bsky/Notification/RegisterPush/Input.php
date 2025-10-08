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

    /** @var ?bool Set to true when the actor is age restricted */
    public ?bool $ageRestricted;

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

    public static function new(
        string $serviceDid,
        string $token,
        string $platform,
        string $appId,
        ?bool $ageRestricted = null,
    ): self {
        $instance = new self();
        $instance->serviceDid = $serviceDid;
        $instance->token = $token;
        $instance->platform = $platform;
        $instance->appId = $appId;
        if ($ageRestricted !== null) {
            $instance->ageRestricted = $ageRestricted;
        }

        return $instance;
    }
}
