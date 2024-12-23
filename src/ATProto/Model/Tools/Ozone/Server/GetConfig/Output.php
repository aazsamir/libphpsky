<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Server\GetConfig;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.server.getConfig';

    public ?ServiceConfig $appview = null;
    public ?ServiceConfig $pds = null;
    public ?ServiceConfig $blobDivert = null;
    public ?ServiceConfig $chat = null;
    public ?ViewerConfig $viewer = null;

    public static function id(): string
    {
        return self::ID;
    }
}
