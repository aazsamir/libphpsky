<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs;

/**
 * object
 */
class ChatPreference implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'chatPreference';
    public const ID = 'app.bsky.notification.defs';

    public string $include;
    public bool $push;

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
        return ['include', 'push'];
    }

    public static function new(string $include, bool $push): self
    {
        $instance = new self();
        $instance->include = $include;
        $instance->push = $push;

        return $instance;
    }
}
