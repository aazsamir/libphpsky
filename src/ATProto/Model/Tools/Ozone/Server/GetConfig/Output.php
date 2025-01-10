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
