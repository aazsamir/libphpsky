<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs;

/**
 * object
 */
class Preference implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'preference';
    public const ID = 'app.bsky.notification.defs';

    public bool $list;
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
        return ['list', 'push'];
    }

    public static function new(bool $list, bool $push): self
    {
        $instance = new self();
        $instance->list = $list;
        $instance->push = $push;

        return $instance;
    }
}
