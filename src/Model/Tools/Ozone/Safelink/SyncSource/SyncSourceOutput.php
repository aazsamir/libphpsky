<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Safelink\SyncSource;

/**
 * object
 */
class SyncSourceOutput implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.safelink.syncSource';

    public int $added;
    public int $updated;
    public int $removed;
    public int $events;

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
        return ['added', 'updated', 'removed', 'events'];
    }

    public static function new(int $added, int $updated, int $removed, int $events): self
    {
        $instance = new self();
        $instance->added = $added;
        $instance->updated = $updated;
        $instance->removed = $removed;
        $instance->events = $events;

        return $instance;
    }
}
