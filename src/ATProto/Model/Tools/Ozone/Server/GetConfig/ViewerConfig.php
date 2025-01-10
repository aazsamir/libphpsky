<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Server\GetConfig;

/**
 * object
 */
class ViewerConfig implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'viewerConfig';
    public const ID = 'tools.ozone.server.getConfig';

    public ?string $role = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(?string $role = null): self
    {
        $instance = new self();
        $instance->role = $role;

        return $instance;
    }
}
