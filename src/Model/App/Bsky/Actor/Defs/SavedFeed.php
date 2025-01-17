<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\App\Bsky\Actor\Defs;

/**
 * object
 */
class SavedFeed implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'savedFeed';
    public const ID = 'app.bsky.actor.defs';

    public string $id;
    public string $type;
    public string $value;
    public bool $pinned;

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
        return ['id', 'type', 'value', 'pinned'];
    }

    public static function new(string $id, string $type, string $value, bool $pinned): self
    {
        $instance = new self();
        $instance->id = $id;
        $instance->type = $type;
        $instance->value = $value;
        $instance->pinned = $pinned;

        return $instance;
    }
}
