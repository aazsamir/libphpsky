<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Server\GetConfig;

/**
 * object
 */
class ServiceConfig implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'serviceConfig';
    public const ID = 'tools.ozone.server.getConfig';

    public ?string $url = null;

    public static function id(): string
    {
        return self::ID;
    }
}
