<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Server\GetConfig;

/**
 * object
 */
class ViewerConfig implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'viewerConfig';
    public const ID = 'tools.ozone.server.getConfig';

    public ?string $role;

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
        return [];
    }

    public static function new(?string $role = null): self
    {
        $instance = new self();
        if ($role !== null) {
            $instance->role = $role;
        }

        return $instance;
    }
}
