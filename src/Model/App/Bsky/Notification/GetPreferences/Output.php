<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Notification\GetPreferences;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'app.bsky.notification.getPreferences';

    public \Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs\Preferences $preferences;

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

    public static function new(\Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs\Preferences $preferences): self
    {
        $instance = new self();
        $instance->preferences = $preferences;

        return $instance;
    }
}
