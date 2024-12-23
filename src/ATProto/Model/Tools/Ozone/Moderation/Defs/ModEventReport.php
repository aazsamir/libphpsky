<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\ATProto\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class ModEventReport implements \Aazsamir\Libphpsky\ATProto\ATProtoObject
{
    use \Aazsamir\Libphpsky\ATProto\Generator\Prefab\FromArray;

    public const NAME = 'modEventReport';
    public const ID = 'tools.ozone.moderation.defs';

    public ?string $comment = null;
    public ?bool $isReporterMuted = null;
    public ?string $reportType = null;

    public static function id(): string
    {
        return self::ID;
    }
}
