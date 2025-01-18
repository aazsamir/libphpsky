<?php

declare(strict_types=1);

namespace Aazsamir\Libphpsky\Model\Tools\Ozone\Moderation\Defs;

/**
 * object
 */
class ModEventReport implements \Aazsamir\Libphpsky\ATProtoObject
{
    use \Aazsamir\Libphpsky\Generator\Prefab\FromArray;
    use \Aazsamir\Libphpsky\Generator\Prefab\ToArray;

    public const NAME = 'modEventReport';
    public const ID = 'tools.ozone.moderation.defs';

    public ?string $comment = null;
    public ?bool $isReporterMuted = null;
    public ?string $reportType = null;

    public static function id(): string
    {
        return self::ID;
    }

    public static function new(
        ?string $comment = null,
        ?bool $isReporterMuted = null,
        ?string $reportType = null,
    ): self {
        $instance = new self();
        $instance->comment = $comment;
        $instance->isReporterMuted = $isReporterMuted;
        $instance->reportType = $reportType;

        return $instance;
    }
}
