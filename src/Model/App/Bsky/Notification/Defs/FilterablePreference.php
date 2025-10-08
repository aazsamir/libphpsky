<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Notification\Defs;

/**
 * object
 */
class FilterablePreference implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'filterablePreference';
    public const ID = 'app.bsky.notification.defs';

    public string $include;
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
        return ['include', 'list', 'push'];
    }

    public static function new(string $include, bool $list, bool $push): self
    {
        $instance = new self();
        $instance->include = $include;
        $instance->list = $list;
        $instance->push = $push;

        return $instance;
    }
}
