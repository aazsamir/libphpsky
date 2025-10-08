<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * Moderation tool information for tracing the source of the action
 * object
 */
class ModTool implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'modTool';
    public const ID = 'tools.ozone.moderation.defs';

    /** @var string Name/identifier of the source (e.g., 'automod', 'ozone/workspace') */
    public string $name;
    public mixed $meta;

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
        return ['name'];
    }

    public static function new(string $name, mixed $meta = null): self
    {
        $instance = new self();
        $instance->name = $name;
        if ($meta !== null) {
            $instance->meta = $meta;
        }

        return $instance;
    }
}
