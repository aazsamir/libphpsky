<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Server\GetConfig;

/**
 * object
 */
class Output implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'output';
    public const ID = 'tools.ozone.server.getConfig';

    public ?ServiceConfig $appview;
    public ?ServiceConfig $pds;
    public ?ServiceConfig $blobDivert;
    public ?ServiceConfig $chat;
    public ?ViewerConfig $viewer;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        ?ServiceConfig $appview = null,
        ?ServiceConfig $pds = null,
        ?ServiceConfig $blobDivert = null,
        ?ServiceConfig $chat = null,
        ?ViewerConfig $viewer = null,
    ): self {
        $instance = new self();
        $instance->appview = $appview;
        $instance->pds = $pds;
        $instance->blobDivert = $blobDivert;
        $instance->chat = $chat;
        $instance->viewer = $viewer;

        return $instance;
    }
}
