<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Server\GetConfig;

/**
 * object
 */
class ServiceConfig implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'serviceConfig';
    public const ID = 'tools.ozone.server.getConfig';

    public ?string $url;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(?string $url = null): self
    {
        $instance = new self();
        $instance->url = $url;

        return $instance;
    }
}
